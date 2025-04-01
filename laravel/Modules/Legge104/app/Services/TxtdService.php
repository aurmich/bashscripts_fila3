<?php

declare(strict_types=1);

namespace Modules\Sigma\Services;

use Exception;
use Illuminate\Support\Facades\Schema;

use function Safe\fclose;
use function Safe\fgetcsv;
use function Safe\fopen;
use function Safe\preg_replace;

class TxtdService
{
    public static function toArray(string $file_txtd): array
    {
        $handle = fopen($file_txtd, 'r');
        if ($handle === false) {
            throw new Exception('$handle = fopen($file_txtd, r);');
        }

        $riga = 0;
        $ris = [];
        $head = [];
        while (false !== ($data = fgetcsv($handle, 2000, '|'))) {
            // if (null === $data) {
            if (empty($data)) {
                continue;
            }

            $riga++;
            // @phpstan-ignore argument.type
            $row = array_map('trim', $data);
            $row = array_map('strtolower', $row);
            if ($riga === 2) {
                $head = $row;
            }

            if ($riga > 3 && isset($data[1])) {
                $ris[] = array_combine($head, $row);
            }// end if
        }
        // end while
        fclose($handle);

        return $ris;
    }

    // end function

    public static function fixFieldName(string $str): string
    {
        $str = trim($str);
        if ($str === 'desc') {
            return 'desc1';
        } // descrizione;
        // preg_match_all(, subject, matches)
        $str = str_replace('§', '10', $str);
        $str = str_replace('\xA7', '10', $str);
        $str = str_replace('$', '11', $str);

        $str1 = (string) preg_replace('/[0-9a-z]/i', '', $str);

        switch (\ord($str1)) {
            case 0:
                break;
            case 167:
                $str = str_replace($str1, '10', $str);
                break;
            case 239:
                $str = str_replace($str1, '_', $str);
                break;
            default:
                echo '<h3>carattere non riconosciuto ['.$str1.']['.\ord($str1).']['.$str.'] Aggiungerlo </h3>';
                exit('<hr/>['.__LINE__.']['.__FILE__.']');
                // break;
        }

        return $str;
    }

    // --------------------------------------------------------------
    public static function getFieldsNames(array $params): array
    {
        extract($params);
        if (! isset($data)) {
            // $data = Txtd_op::toArray($filename);
            if (! isset($filename)) {
                throw new Exception('!isset($filename)');
            }

            $data = self::toArray($filename);
        }

        // @phpstan-ignore argument.templateType, argument.templateType
        $data = collect($data);
        $keyed = $data->keyBy(static fn (array $item): string => self::fixFieldName($item['nome']));
        $keys = $keyed->keys();

        return $keys->all();
    }

    // --------------------------------------------------------------
    public static function createTable(array $params): string
    {
        $tmp = self::toArray($params['filename']);
        if (\count($tmp) < 2) {
            return '<h3> file scaricato male riprovare </h3>';
        }

        Schema::connection($params['conn'])->dropIfExists($params['tbl']);

        // dd('--'.count($tmp).'--');
        Schema::connection($params['conn'])->create($params['tbl'], static function ($table) use ($tmp): void {
            $table->increments('id');
            // while (list($k, $v)=each($tmp)) {
            foreach ($tmp as $v) {
                // if($v['nome']=='desc') $v['nome']='desc1';
                $v['nome'] = self::fixFieldName($v['nome']);
                switch ($v['tipo']) {
                    case 'carattere':
                        if ($v['lunghezza'] > 255) {
                            $table->text($v['nome']);
                        } else {
                            $table->char($v['nome'], $v['lunghezza']);
                        }

                        break;
                    case 'numero':
                        if ($v['dec'] > 0) {
                            $table->decimal($v['nome'], $v['lunghezza'], $v['dec']);
                        } else {
                            $table->integer($v['nome']);
                        }

                        break;
                    default:
                        exit('['.$v['tipo'].']['.__LINE__.']['.__FILE__.']');
                        // 117    Unreachable statement - code above always terminates.
                        // break;
                }
            }
        });

        return '<h3>Creato tabella '.$params['conn'].'.'.$params['tbl'].'</h3>';
    }

    // end createTable
}// end class
