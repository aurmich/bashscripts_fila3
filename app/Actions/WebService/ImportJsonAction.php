<?php

declare(strict_types=1);

namespace Modules\Sigma\Actions\WebService;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Modules\Sigma\Models\Anag;
use Spatie\QueueableAction\QueueableAction;

class ImportJsonAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $filename, string $disk, string $tbl): string
    {
        // $this->downloadFile();
        // $filename = 'wstr01f-oggi.csv';
        $tbl_arr = explode('_', $tbl);
        $tbl_name = Arr::first($tbl_arr);
        $tbl_name = strtolower((string) $tbl_name);

        $content = Storage::disk($disk)->get($filename);

        // mb_internal_encoding('UTF-8');

        $content = utf8_encode($content);

        $rows = \Safe\json_decode($content); // JSON_UNESCAPED_UNICODE

        // $rows = json_decode($content, false, 512, JSON_UNESCAPED_UNICODE);
        if (isset($rows->messaggio)) {
            if ($rows->messaggio === 'La query non ha prodotto alcun record') {
                return '<h3>'.$tbl_name.' [0] Records</h3>';
            }

            return '<h2 style="color:red">
                Tbl: ['.$tbl.']<br/>
                Filename:['.$filename.']<br/>
                messaggio ['.$rows->messaggio.']
                Json error ['.json_last_error_msg().']
                Line ['.__LINE__.']
            </h2>'.$content;
        }

        $conn = (new Anag)->getConnection();
        $dbname = $conn->getDatabaseName();
        $pdo = $conn->getpdo();
        try {
            if (\count($rows ?? []) > 5) {
                $sql = 'truncate table '.$dbname.'.'.$tbl_name;
                $n_rows = $pdo->exec($sql);
            }
        } catch (Exception $exception) {
            return '<h1 style="color:red;">TABELLA IMPORTATA MALE <br/>
                Tbl: ['.$tbl.']<br/>
                Filename:['.$filename.']<br/>
                e:['.$exception->getMessage().']
                Json error ['.json_last_error_msg().']
                Line ['.__LINE__.']
                </h1>'.$content;
        }

        // $n_rows = $pdo->exec($sql);
        foreach ($rows ?? [] as $row) {
            if (\is_object($row)) {
                $row = get_object_vars($row);
            }

            $keys = collect($row)
                ->map(static fn ($item, $key): string => strtolower((string) $key))
                ->all();
            $values = collect($row)
                ->map(static function ($item, $key) {
                    if (is_numeric($item)) {
                        return $item;
                    }

                    return '"'.str_replace('"', '', (string) $item).'"';
                })
                ->all();
            $sql = 'INSERT INTO `'.$dbname.'`.'.$tbl_name.' ('.implode(', ', $keys).') VALUES ('.implode(', ', $values).');';
            // echo '<pre>'.print_r($sql, 1).'</pre>';
            try {
                $n_rows = $pdo->exec($sql);
            } catch (Exception $e) {
                dddx(['e' => $e->getMessage(), 'row' => $row, 'filename' => $filename, 'tbl' => $tbl]);
            }
        }

        // return  '<h3>N Righe: '.$n_rows.'</h3>';
        return '<h3>'.$tbl_name.' ['.\count($rows ?? []).'] Records</h3>';
    }
}
