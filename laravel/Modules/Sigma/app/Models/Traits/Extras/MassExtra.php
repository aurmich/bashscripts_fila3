<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Extras;

use Exception;
use Illuminate\Support\Facades\Schema;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Codici;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Repart;
use Modules\Sigma\Models\Tqu00f;

// ------- services -------

trait MassExtra
{
    public static function massUpdateCognomeNome(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (isset($model)) {
            $table = $model->getTable();
            $conn = $model->getConnection();
        }

        $tbl = new Ana10f;

        /*
        $fieldz=['ente','matr'];
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        if (! isset($table) && isset($model)) {
            $table = $model->getTable();
        }

        if (! isset($conn) && isset($model)) {
            $conn = $model->getConnection();
        }

        $sql = 'update '.$table.' set cognome = (select conome from generale.ana10f
		where ana10f.ente='.$table.'.ente and
			  ana10f.matr='.$table.'.matr limit 1)
		where '.$where;
        $conn->statement($sql);
        $sql = 'update '.$table.' set nome = (select nome from generale.ana10f
		where ana10f.ente='.$table.'.ente and
			  ana10f.matr='.$table.'.matr
			  limit 1)
		where '.$where;
        $conn->statement($sql);
    }

    // end massUpdateCognomeNome

    public static function massUpdateCategoriaEco(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Tqu00f;

        /*
        $fieldz=['propro','posfun'];
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $fieldname = 'categoria_eco';
        if (! Schema::connection($conn->getName())->hasColumn($table, $fieldname)) {
            Schema::connection($conn->getName())->table($table, static function ($table) use ($fieldname): void {
                $table->string($fieldname);
            });
        }

        $sql = 'update '.$table.' set categoria_eco = (
		select desc1 from generale.tqu00f as B
		where B.propro = '.$table.'.propro
			and B.posfun = '.$table.'.posfun
			limit 1
		   ) where '.$where;
        $conn->statement($sql);
    }

    // end function

    public static function massUpdatePosizTxt(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Codici;
        // $tbl->indexIfNotExists(['tipo', 'codice']);

        $fieldname = 'posiz_txt';
        if (! Schema::connection($conn->getName())->hasColumn($table, $fieldname)) {
            Schema::connection($conn->getName())->table($table, static function ($table) use ($fieldname): void {
                $table->integer($fieldname);
            });
        }

        $sql = 'update '.$table.' set posiz_txt = (
		select desc1 from generale.codici as B
		where B.tipo = 19
			and B.codice = '.$table.'.posiz
			limit 1
		) where '.$where;
        $conn->statement($sql);
    }

    // end function

    public static function massUpdateStabiTxtReparTxt(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Repart;
        $fieldz = ['ente', 'stabi', 'repar'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $sql = 'update '.$table.' set stabi_txt = (
		select dest1 from generale.repart as B
		where B.ente='.$table.'.ente
		and B.stabi ='.$table.'.stabi
		and B.repar =0
		limit 1
	) where '.$where;
        $conn->statement($sql);
        $sql = 'update '.$table.' set repar_txt = (
		select dest1 from generale.repart as B
		where B.ente='.$table.'.ente
		and B.stabi ='.$table.'.stabi
		and B.repar ='.$table.'.repar
		limit 1
	) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGInSede(array $params): void
    {
        self::massUpdateGGInSedeQua00f($params);
    }

    public static function massUpdateGGInSedeQua00f(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Qua00f;
        $fieldz = ['ente', 'matr', 'propro', 'posfun', 'quaann', 'qua2kd', 'qua2ka'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $conn1 = $tbl->getConnection();
        $tbl = $tbl->getTable();
        if (! Schema::connection($conn1->getName())->hasColumn($tbl, 'gg_in_sede')) {
            Schema::connection($conn1->getName())->table($tbl, static function ($table): void {
                $table->integer('gg_in_sede');
            });
        }

        // dd('['.__LINE__.']['.__FILE__.']');

        $diff_sql = self::date_diff_sql('qua2kd', 'qua2ka', $params);
        /* categoria_ecoval o categoria_eco e basta ? */
        if (! isset($fino_al)) {
            throw new Exception('fino_al is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update '.$table.' set gg_in_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua00f as B
		where B.ente='.$table.'.ente
		and   B.matr='.$table.'.matr
		and quaann=""
		and '.$fino_al.'>= qua2kd
		';
        if (isset($fino_dal) && $fino_dal !== '') {
            $sql .= \chr(13).'and ('.$fino_dal.'<=qua2ka or qua2ka=0) '.\chr(13);
        }

        $sql .= ' ) where '.$where;
        $conn->statement($sql);
    }

    // ---------------------------------------------------------------------------
    public static function date_limit_sql_to(string $field, string $date): string
    {
        // retrocomp
        if ($date === '') {
            return $field;
        }

        return 'if('.$field.'=0 or '.$field.'>'.$date.' ,'.$date.','.$field.')';
    }

    public static function date_limit_sql_from(string $field, string $date): string
    {
        if ($date === '') {
            return $field;
        } // lo zero lo tengo per leggibilita' azione in teoria impossibile, ma cosi' prevengo errori

        return 'if('.$field.'=0 or '.$field.'<'.$date.' ,'.$date.','.$field.')';
    }

    // -----------------------------------------------------------------------------

    // -----------------------------------------------------------------------------
    public static function date_diff_sql($field_dal, $field_al, array $params): string
    {
        $dal = $field_dal;
        $al = $field_al;
        if (isset($params['fino_dal']) && $params['fino_dal'] !== null) {
            $dal = self::date_limit_sql_from($field_dal, $params['fino_dal']);
        }

        if (isset($params['fino_al'])) {
            $al = self::date_limit_sql_to($field_al, $params['fino_al']);
        }

        // $sql='if(COALESCE(sum(datediff('.$al.','.$dal.')+1),0)<0, 0 ,COALESCE(sum(datediff('.$al.','.$dal.')+1),0))';
        // $sql='GREATEST(COALESCE(sum(datediff('.$al.','.$dal.')+1),0),0)';
        $sql = 'COALESCE(sum(greatest(datediff('.$al.','.$dal.')+1,0)),0)';

        return $sql;
    }

    // -----------------------------------------------------------------------------

    public static function massUpdateGGPosizInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Qua00f;
        $fieldz = ['ente', 'matr', 'propro', 'posfun', 'quaann', 'qua2kd', 'qua2ka'];
        // $tbl->indexIfNotExists($fieldz);

        $conn1 = $tbl->getConnection();
        $tbl = $tbl->getTable();
        if (! Schema::connection($conn1->getName())->hasColumn($tbl, 'gg_in_sede')) {
            Schema::connection($conn1->getName())->table($tbl, static function ($table): void {
                $table->integer('gg_in_sede');
            });
        }

        if (! isset($posiz)) {
            throw new Exception('posiz is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        // dd('['.__LINE__.']['.__FILE__.']');

        $diff_sql = self::date_diff_sql('qua2kd', 'qua2ka', $params);
        /* categoria_ecoval o categoria_eco e basta ? */

        $sql = 'update '.$table.' set gg_posiz_'.$posiz.'_in_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua00f as B
		where B.ente='.$table.'.ente
		and   B.matr='.$table.'.matr
		and quaann=""
		and posiz='.$posiz.'
		and '.$params['fino_al'].'>= qua2kd
		';
        if (isset($params['fino_dal']) && $params['fino_dal'] !== '') {
            $sql .= \chr(13).'and ('.$params['fino_dal'].'<=qua2ka or qua2ka=0) '.\chr(13);
        }

        $sql .= ' ) where '.$where;
        echo '<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    // end function

    public static function massUpdateGGAnnoInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        $field = 'gg_presenze_in_anno';
        extract($params);
        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Qua00f;
        $fieldz = ['ente', 'matr', 'quaann', 'qua2kd', 'qua2ka'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field_i) {
            FilterTrait::indexIfNotExists($field_i, $tbl->getTable(), $tbl->getConnection());
        }
        */
        if (! Schema::connection($conn->getName())->hasColumn($table, $field)) {
            Schema::connection($conn->getName())->table($table, static function ($table) use ($field): void {
                $table->integer($field);
            });
        }

        $sql = 'update '.$table.' set '.$field.' = (
			select sum(datediff(if(qua2ka=0,'.$anno.'1231,qua2ka),if(qua2kd<'.$anno.'0101,'.$anno.'0101,qua2kd))+1) as gg
			from generale.'.$tbl->getTable().' as B
			where B.ente='.$table.'.ente
			and   B.matr='.$table.'.matr

			and quaann=""
			and (
				( '.$anno.' between year(qua2kd) and year(qua2ka) )
				or
				('.$anno.' >= year(qua2kd) and qua2ka=0 )
			)
		)  where '.$where;
        echo '<hr/>['.__LINE__.']['.__FILE__.']<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    public static function massUpdateGGAssenzeAnnoInSede(array $params): void
    {
        $params['umi'] = 'G';
        if (! isset($params['field'])) {
            $params['field'] = 'gg_assenze_in_anno';
        }

        self::massUpdateUMIAssenzeAnnoInSede($params);
    }

    // --------------------------------------------------------------------
    public static function massUpdateHHAssenzeAnnoInSede(array $params): void
    {
        $params['umi'] = 'O';
        if (! isset($params['field'])) {
            $params['field'] = 'ore_assenze_in_anno';
        }

        self::massUpdateUMIAssenzeAnnoInSede($params);
    }

    public static function massUpdateUMIAssenzeAnnoInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        // $field='gg_assenze_in_anno';
        extract($params);
        // $tbl= new Asz00f();
        $tbl = new Asz00k1;
        $fieldz = ['ente', 'matr', 'aszumi', 'aszann', 'asz2kd', 'asz2ka'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field_i) {
            FilterTrait::indexIfNotExists($field_i, $tbl->getTable(), $tbl->getConnection());
        }
        */
        /*
        if (! Schema::connection($conn->getName())->hasColumn($table, $field)) {
            Schema::connection($conn->getName())->table($table, function ($table) use ($field): void {
                $table->integer($field);
            });
        }
        */
        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($umi)) {
            throw new Exception('umi is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($field)) {
            throw new Exception('field is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update '.$table.' set '.$field.' = (
			select sum(datediff(asz2ka,asz2kd)+1) as gg
			from generale.'.$tbl->getTable().' as B
			where B.ente='.$table.'.ente
			and   B.matr='.$table.'.matr
			and aszumi="'.$umi.'"
			and aszann=""
			and (
				( '.$anno.' between year(asz2kd) and year(asz2ka) )
				or
				('.$anno.' >= year(asz2kd) and asz2ka=0 )
			)
		)  where '.$where;
        echo '<hr/>['.__LINE__.']['.__FILE__.']<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    // -------------------------------------------------------------------
    // ------------------------------------------------------------------
    public static function massUpdateGGFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        // $diff_sql=self::date_diff_sql('qua2kd','qua2ka',$params); //bug ?
        $diff_sql = self::date_diff_sql('q32kd', 'q32ka', $params);
        $tbl = new Qua03f;
        $fieldz = ['ente', 'matr', 'q3desc', 'q32ka', 'q32kd', 'q3ann'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */

        // where q3desc not like "%ricon%"  and q3desc not like "%riscatto%"

        $sql = 'update '.$table.' set gg_fuori_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua03f as B
		where find_in_set(q3tipo,"101,102,103,104,105,121")
		and q3ann=""
		and q32ka!=0
		and  B.ente = '.$table.'.ente
		and  B.matr= '.$table.'.matr
		and '.$params['fino_al'].'>= q32kd
	) where '.$where;
        $conn->statement($sql);
        // ------- numero periodi
        $sql = 'update '.$table.' set n_gg_fuori_sede = (
		select count(*) as q
		from generale.qua03f as B
		where find_in_set(q3tipo,"101,102,103,104,105,121")
		and q3ann=""
		and q32ka!=0
		and  B.ente = '.$table.'.ente
		and  B.matr= '.$table.'.matr
		and '.$params['fino_al'].'>= q32kd
	) where '.$where;
        $conn->statement($sql);
        // ------- numero periodi
    }

    // ------------------------------------------------------------------
    // ------------------------------------------------------------------
    public static function massUpdateGGCatEcoInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        // dddx($params);
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Qua00f;
        $fieldz = ['ente', 'matr', 'propro', 'posfun', 'quaann', 'qua2kd', 'qua2ka'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $conn1 = $tbl->getConnection();
        $tbl = $tbl->getTable();
        if (! Schema::connection($conn1->getName())->hasColumn($tbl, 'categoria_eco')) {
            Schema::connection($conn1->getName())->table($tbl, static function ($table): void {
                $table->string('categoria_eco');
            });
        }

        /*  !!!!!!!!!!!!!!!! DA FIX !!!!!!!!!!!!!!!!!!!
        \DB::update('update generale.'.$tbl.' set categoria_eco = (select categoria from progressione.categoria_propro where find_in_set(propro,lista_propro) and anno='.$anno.')');
        //dd('['.__LINE__.']['.__FILE__.']');
        */

        $diff_sql = self::date_diff_sql('qua2kd', 'qua2ka', $params);
        /* categoria_ecoval o categoria_eco e basta ? */
        // B.categoria_eco<='.$table.'.categoria_ecoval  per caso mattara che era D poi tornata C, prob
        // metteremo parametro
        $sql = 'update '.$table.' set gg_cateco_in_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua00f as B
		where B.ente='.$table.'.ente
		and   B.matr='.$table.'.matr

		and   B.categoria_eco>='.$table.'.categoria_ecoval
		and quaann=""
		and '.$params['fino_al'].'>= qua2kd
		';
        if (isset($params['fino_dal']) && $params['fino_dal'] !== '') {
            $sql .= \chr(13).'and ('.$params['fino_dal'].'<=qua2ka or qua2ka=0) '.\chr(13);
        }

        $sql .= ' ) where '.$where;
        echo '<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    // end function

    // ----------------------------------------------------------------------
    public static function massUpdateGGCatEcoPosfunInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $diff_sql = self::date_diff_sql('qua2kd', 'qua2ka', $params);
        $tbl = new Qua00f;
        $fieldz = ['ente', 'matr', 'propro', 'posfun', 'quaann', 'qua2kd', 'qua2ka'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */

        $conn1 = $tbl->getConnection();
        $tbl1 = $tbl->getTable();
        if (! Schema::connection($conn1->getName())->hasColumn($tbl1, 'categoria_eco')) {
            Schema::connection($conn1->getName())->table($tbl1, static function ($table): void {
                $table->string('categoria_eco');
            });
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_cateco_posfun_in_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_cateco_posfun_in_sede');
            });
        }

        /*  !!!!!!!!!!! DA FIX !!!!!!!!!!!!!!!!!!!!!
        \DB::update(
        'update generale.'.$tbl1.' set categoria_eco =
            ( select categoria from progressione.categoria_propro where find_in_set(propro,lista_propro) )'
            );
        */
        // --- de gioia ha un periodo superiore in mezzo  substr(B.posfun,-1)<=substr('.$table.'.posfun,-1)
        $sql = 'update '.$table.' set gg_cateco_posfun_in_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua00f as B
		where B.ente='.$table.'.ente
		and   B.matr='.$table.'.matr
		and (
			B.categoria_eco>'.$table.'.categoria_ecoval
			or(
				B.categoria_eco='.$table.'.categoria_ecoval
				and   substr(B.posfun,-1)>=substr('.$table.'.posfun,-1)
			)
		)
		and quaann=""
		and '.$params['fino_al'].'>= qua2kd
		) where '.$where;
        echo '[Sigma\\Models\\Anag]['.__LINE__.']<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    // ----------------------------------------------------------------------
    public static function massUpdateGGCatEcoFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $tbl = new Qua03f;
        $fieldz = ['ente', 'matr', 'q3desc', 'q3pro', 'q3fun', 'q32kd', 'q32ka', 'q3ann'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $conn1 = $tbl->getConnection();
        $tbl1 = $tbl->getTable();
        if (! Schema::connection($conn1->getName())->hasColumn($tbl1, 'categoria_eco')) {
            Schema::connection($conn1->getName())->table($tbl1, static function ($table): void {
                $table->string('categoria_eco');
            });
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_cateco_fuori_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_cateco_fuori_sede');
            });
        }

        // !!!!!!!!!!! DA FIX !!!!!!!!!!!!!!!!!!!
        /*
        \DB::update(
        'update generale.'.$tbl1.' set categoria_eco =
            ( select categoria from progressione.categoria_propro where find_in_set(q3pro,lista_propro) and anno='.$anno.')'
            );
        */
        $diff_sql = self::date_diff_sql('q32kd', 'q32ka', $params);

        // where q3desc not like "%ricon%"  and q3desc not like "%riscatto%"
        $sql = 'update '.$table.' set gg_cateco_fuori_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua03f as B
		where find_in_set(q3tipo,"101,102,103,104,105,121")
		and q3ann=""
		and q32ka!=0
		and  B.ente = '.$table.'.ente
		and  B.matr= '.$table.'.matr

		and   B.categoria_eco='.$table.'.categoria_ecoval
		and '.$params['fino_al'].'>= q32kd
	) where '.$where;
        $conn->statement($sql);
    }

    // --------------------------------------------------------------------------------------------------
    public static function massUpdateGGCatEcoPosfunFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $diff_sql = self::date_diff_sql('q32kd', 'q32ka', $params);
        $tbl = new Qua03f;
        $fieldz = ['q3desc', 'q3ann', 'q32ka', 'q32kd', 'ente', 'matr', 'q3pro', 'q3fun'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $conn1 = $tbl->getConnection();
        $tbl1 = $tbl->getTable();
        if (! Schema::connection($conn1->getName())->hasColumn($tbl1, 'categoria_eco')) {
            Schema::connection($conn1->getName())->table($tbl1, static function ($table): void {
                $table->string('categoria_eco');
            });
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_cateco_posfun_fuori_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_cateco_posfun_fuori_sede');
            });
        }

        // !!!!!!!!!!! DA FIX !!!!!!!!!!!!!!!!!!!
        /*
        \DB::update(
        'update generale.'.$tbl1.' set categoria_eco =
            ( select categoria from progressione.categoria_propro where find_in_set(q3pro,lista_propro) )'
            );
        */

        // where q3desc not like "%ricon%"  and q3desc not like "%riscatto%"
        $sql = 'update '.$table.' set gg_cateco_posfun_fuori_sede = (
		select '.$diff_sql.' as giorni
		from generale.qua03f as B

		where find_in_set(q3tipo,"101,102,103,104,105,121")

		and q3ann=""
		and q32ka!=0
		and  B.ente = '.$table.'.ente
		and  B.matr= '.$table.'.matr

		and   B.categoria_eco='.$table.'.categoria_ecoval
		and   B.q3fun='.$table.'.posfun
		and '.$params['fino_al'].'>= q32kd
	) where '.$where;
        $conn->statement($sql);
    }

    // --------------------------------------------------------------------------------------------------
    // -----------------------------------------------------------------------------

    public static function massUpdateGGNOCatEcoInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_no_cateco_in_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_no_cateco_in_sede');
            });
        }

        $sql = 'update '.$table.' set gg_no_cateco_in_sede = (
		gg_in_sede - gg_cateco_in_sede
	) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGNOCatEcoFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_no_cateco_fuori_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_no_cateco_fuori_sede');
            });
        }

        $sql = 'update '.$table.' set gg_no_cateco_fuori_sede = (
		gg_fuori_sede - gg_cateco_fuori_sede
	) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGNOCatEcoPosfunInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_no_cateco_posfun_in_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_no_cateco_posfun_in_sede');
            });
        }

        $sql = 'update '.$table.' set gg_no_cateco_posfun_in_sede = (
		gg_in_sede - gg_cateco_posfun_in_sede
	) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGNOCatEcoPosfunFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_no_cateco_posfun_fuori_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_no_cateco_posfun_fuori_sede');
            });
        }

        $sql = 'update '.$table.' set gg_no_cateco_posfun_fuori_sede = (
		gg_fuori_sede - gg_cateco_posfun_fuori_sede
	) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGAspettativeInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($lista_codici_aspettative)) {
            throw new Exception('lista_codici_aspettative is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $diff_sql = self::date_diff_sql('asz2kd', 'asz2ka', $params);
        $tbl = new Asz00k1;
        $fieldz = ['asztip', 'aszcod', 'aszann', 'ente', 'matr', 'asz2kd', 'asz2ka'];
        // $tbl->indexIfNotExists($fieldz);
        /*
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field, $tbl->getTable(), $tbl->getConnection());
        }
        */
        $sql = 'update '.$table.' set gg_aspettative_in_sede = (
		select '.$diff_sql.' as giorni
		from generale.asz00k1 as B
		where B.aszann=""
		and  B.ente = '.$table.'.ente
		and  B.matr= '.$table.'.matr
		and find_in_set(concat(asztip,"-",aszcod),"'.$lista_codici_aspettative.'")
		and '.$params['fino_al'].'>= asz2kd
	';
        if (isset($params['fino_dal']) && $params['fino_dal'] !== '') {
            $sql .= \chr(13).'and ('.$params['fino_dal'].'<=asz2ka or asz2ka=0) '.\chr(13);
        }

        $sql .= ' ) where '.$where;
        echo '['.__LINE__.']['.__FILE__.']<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    public static function massUpdateGGAspettativeFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        // --- predisposto per trovare il valore che per ora non viene gestito
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update '.$table.' set gg_aspettative_fuori_sede = 0
		where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGAspettativeCatEcoPondInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($table_aspettative)) {
            throw new Exception('table_aspettative is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($lista_codici_aspettative)) {
            throw new Exception('lista_codici_aspettative is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        // $tbl= new AspettativeProgressione();
        /* tbl lo passo da params cosi miglioro.
        $fieldz=['asztip','aszcod','aszann','ente','matr','asz2kd','asz2ka'];
        foreach ($fieldz as  $field) {
            FilterTrait::indexIfNotExists($field,$tbl->getTable(),$tbl->getConnection());
        }
        */
        // da rifare con truncate ed insert quando siamo stabili
        $sql = 'drop table if exists '.$table_aspettative.';';
        $res = $conn->statement($sql);
        $sql = 'create table '.$table_aspettative.'
	(select
		distinct B.ente,B.matr,asztip,aszcod,asz2kd,asz2ka,qua2kd,qua2ka
		,if(asz2kd>qua2kd,asz2kd,qua2kd) as dal,if(asz2ka<qua2ka,asz2ka,if(qua2ka=0,asz2ka,qua2ka)) as al
		,propro,posfun,"AAA" as categoria_eco,9999 as propro_val,9999 as posfun_val,"AAA" as categoria_eco_val,9999999999 as gg,999.99 as peso,9999999999.99 as gg_pond

		from generale.asz00k1 as B
		join generale.qua00f as Q
		on Q.ente=B.ente
		and Q.matr=B.matr
		and (
			(Q.qua2kd between B.asz2kd and B.asz2ka) or
			(Q.qua2kd >= B.asz2kd and B.asz2ka=0) or
			(B.asz2kd between Q.qua2kd and Q.qua2ka) or
			(B.asz2kd >= Q.qua2kd and Q.qua2ka=0)
		)

		where B.aszann=""
		and Q.quaann=""
		and find_in_set(concat(asztip,"-",aszcod),"'.$lista_codici_aspettative.'")

	);';
        $res = $conn->statement($sql);
        $parz = $params;
        $parz['table'] = $table_aspettative;
        $diff_sql = self::date_diff_sql('dal', 'al', $parz);

        // echo '<pre>';print_r($diff_sql);echo '</pre>';
        $diff_sql = str_replace('COALESCE(sum(greatest(', '', $diff_sql);
        $diff_sql = str_replace(',dal)+1,0)),0)', ',dal)+1', $diff_sql);
        $diff_sql = str_replace(',dal))+1,0)),0)', ',dal))+1', $diff_sql);

        $sql = 'update '.$table_aspettative.' set gg=greatest('.$diff_sql.',0)';
        // echo '<pre>'.$sql.'</pre>';die('<hr/>['.__LINE__.']['.__FILE__.']');
        $res = $conn->statement($sql);
        // ---------
        if (! isset($coeff)) {
            throw new Exception('coeff is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($coeff['gg_cateco_posfun_in_sede'])) {
            dddx('andare su COEFF e aggiornare Anno');
        }

        $cateco_posfun = $coeff['gg_cateco_posfun_in_sede']->value;
        $cateco_no_posfun = $coeff['gg_cateco_no_posfun_in_sede']->value;
        $no_cateco = $coeff['gg_no_cateco_in_sede']->value;

        // $no_propro_no_posfun=$coeff['gg_no_propro_no_posfun_in_sede']->value;
        // $no_propro_no_posfun=$no_propro_posfun; // solo in questo caso

        $sql = 'update '.$table_aspettative.' as A set propro_val=
		(select propro from '.$table.' as B
		where A.ente=B.ente and A.matr=B.matr
		 and '.str_replace($table.'.', 'B.', (string) $where).' limit 1)';
        $res = $conn->statement($sql);
        $sql = 'update '.$table_aspettative.' as A set posfun_val=
		(select posfun from '.$table.' as B
		where A.ente=B.ente and A.matr=B.matr
		 and '.str_replace($table.'.', 'B.', (string) $where).' limit 1)';
        $conn->statement($sql);

        $sql = 'update '.$table_aspettative.' set categoria_eco=(select categoria from categoria_propro where find_in_set(propro,lista_propro) and anno='.$anno.')';
        $conn->statement($sql);
        $sql = 'update '.$table_aspettative.' set categoria_eco_val=(select categoria from categoria_propro where find_in_set(propro_val,lista_propro) and anno='.$anno.')';
        $conn->statement($sql);

        $sql = 'update '.$table_aspettative.' set peso=if(categoria_eco=categoria_eco_val,if(substr(posfun,-1)=substr(posfun_val,-1),'.$cateco_posfun.','.$cateco_no_posfun.')
	,'.$no_cateco.')';
        $conn->statement($sql);
        $sql = 'update '.$table_aspettative.' set gg_pond=(gg*peso) ';
        $conn->statement($sql);
    }

    public static function massUpdateGGAspettativeCatEcoPondFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($table_aspettative)) {
            throw new Exception('table_aspettative is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($coeff)) {
            throw new Exception('coeff is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'drop table if exists '.$table_aspettative.';';
        $res = $conn->statement($sql);
        $sql = 'create table '.$table_aspettative.' (
		select distinct B.ente,B.matr,85 as asztip,q3tipo as aszcod,q3pro as propro,q3fun as posfun,"AAA" as categoria_eco,q32kd as dal,q32ka as al
		,9999 as propro_val,9999 as posfun_val,"AAA" as categoria_eco_val,9999999999 as gg,999.99 as peso,9999999999.99 as gg_pond
		from generale.qua03f as B where B.q3tipo=121 and q3ann=""  )';
        $res = $conn->statement($sql);

        $parz = $params;
        $parz['table'] = $table_aspettative;
        $diff_sql = self::date_diff_sql('dal', 'al', $parz);
        $diff_sql = str_replace('COALESCE(sum(greatest(', '', $diff_sql);
        $diff_sql = str_replace(',dal)+1,0)),0)', ',dal)+1', $diff_sql);
        $diff_sql = str_replace(',dal))+1,0)),0)', ',dal))+1', $diff_sql);

        $sql = 'update '.$table_aspettative.' set gg=greatest('.$diff_sql.',0)';
        echo '<pre>'.$sql.'</pre>';
        $res = $conn->statement($sql);
        // ------------------------------------------------------------
        $cateco_posfun = $coeff['gg_cateco_posfun_in_sede']->value;
        $cateco_no_posfun = $coeff['gg_cateco_no_posfun_in_sede']->value;
        $no_cateco = $coeff['gg_no_cateco_in_sede']->value;

        $sql = 'update '.$table_aspettative.' as A set propro_val=
		(select propro from '.$table.' as B
		where A.ente=B.ente and A.matr=B.matr
		 and '.str_replace($table.'.', 'B.', (string) $where).' limit 1)';
        $res = $conn->statement($sql);
        $sql = 'update '.$table_aspettative.' as A set posfun_val=
		(select posfun from '.$table.' as B
		where A.ente=B.ente and A.matr=B.matr
		 and '.str_replace($table.'.', 'B.', (string) $where).' limit 1)';
        $conn->statement($sql);

        $sql = 'update '.$table_aspettative.' set categoria_eco=(select categoria from categoria_propro where find_in_set(propro,lista_propro) and anno='.$anno.')';
        $conn->statement($sql);
        $sql = 'update '.$table_aspettative.' set categoria_eco_val=(select categoria from categoria_propro where find_in_set(propro_val,lista_propro) and anno='.$anno.')';
        $conn->statement($sql);

        $sql = 'update '.$table_aspettative.' set peso=if(categoria_eco=categoria_eco_val,if(substr(posfun,-1)=substr(posfun_val,-1),'.$cateco_posfun.','.$cateco_no_posfun.')
	,'.$no_cateco.')';
        $conn->statement($sql);
        $sql = 'update '.$table_aspettative.' set gg_pond=(gg*peso) ';
        $conn->statement($sql);
    }

    public static function massUpdateGGCatEcoNoPosfunInSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);

        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_cateco_no_posfun_in_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_cateco_no_posfun_in_sede');
            });
        }

        $sql = 'update '.$table.' set gg_cateco_no_posfun_in_sede=gg_cateco_in_sede - gg_cateco_posfun_in_sede where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGCatEcoNoPosfunFuoriSede(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! Schema::connection($conn->getName())->hasColumn($table, 'gg_cateco_no_posfun_fuori_sede')) {
            Schema::connection($conn->getName())->table($table, static function ($table): void {
                $table->integer('gg_cateco_no_posfun_fuori_sede');
            });
        }

        $sql = 'update '.$table.' set gg_cateco_no_posfun_fuori_sede=gg_cateco_fuori_sede - gg_cateco_posfun_fuori_sede where '.$where;
        $conn->statement($sql);
    }

    // in anag.old c'e' una altra funzione capire quale dellle 2
    public static function massUpdateGGAspettativePondInSede(array $params): void
    {
        with(new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update schede set gg_aspettative_pond_in_sede = (
		select COALESCE(sum(gg_pond),0) from aspettative_progressione_in_sede
		where schede.ente =aspettative_progressione_in_sede.ente
		and schede.matr =aspettative_progressione_in_sede.matr
		) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateGGAspettativePondFuoriSede(array $params): void
    {
        with(new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update schede set gg_aspettative_pond_fuori_sede = (
		select COALESCE(sum(gg_pond),0) from aspettative_progressione_fuori_sede
		where schede.ente =aspettative_progressione_fuori_sede.ente
		and schede.matr =aspettative_progressione_fuori_sede.matr
		) where '.$where;
        echo '['.__LINE__.']['.__FILE__.']<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }

    public static function massUpdatePosfunval(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update '.$table.' set posfunval=substr(posfun,-1) where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateCategoriaEcoval(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = 'update '.$table.' as A set categoria_ecoval=(
		select categoria from categoria_propro as B where find_in_set(A.propro,B.lista_propro)
		and anno='.$anno.'
		) where '.str_replace($table.'.', 'A.', (string) $where);
        $conn->statement($sql);
    }

    public static function massUpdateGGTotPond(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $sql = [];
        if (! isset($coeff)) {
            throw new Exception('coeff is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        // foreach (Coeff::where('anno', $params['anno'])->get() as $row) {
        foreach ($coeff as $row) {
            if ($row->value !== 0) {
                $sql[] = '('.$row->name.' * '.$row->value.')';
            }
        }

        $sql = 'update '.$table.' set gg_tot_pond=('.\chr(13).implode(\chr(13).'+', $sql).\chr(13).') '.\chr(13).' where '.$where;
        $conn->statement($sql);
    }

    public static function massUpdateUltimi3AnniPerfInd(array $params): void
    {
        $table = (new self)->getTable();
        $conn = (new self)->getConnection();
        extract($params);
        if (! isset($where)) {
            throw new Exception('where is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        echo '<h3>'.__FUNCTION__.'</h3>';
        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($n_perf_ind)) {
            throw new Exception('n_perf_ind is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        for ($i = 1; $i <= $n_perf_ind; $i++) {
            $fieldname = 'perf_ind_'.($anno - $i);
            if (! Schema::connection($conn->getName())->hasColumn($table, $fieldname)) {
                Schema::connection($conn->getName())->table($table, static function ($table) use ($fieldname): void {
                    $table->decimal($fieldname, 10, 3);
                });
            }

            $sql = 'update '.$table.' as A set perf_ind_'.($anno - $i).' =
				(select COALESCE(sum(B.totale_punteggio * (datediff(B.al,B.dal)+1))/( sum(datediff(B.al,B.dal)+1)  ),0)
				from produ40.performance_individuale as B
				where B.anno='.($anno - $i).' and (B.ha_diritto>0 or B.posfun>=100)
				and B.matr=A.matr
				) where A.ha_diritto>0 and A.anno='.$anno;
            $res = $conn->statement($sql);
            echo '<pre>'.htmlspecialchars($sql).'</pre>';
        }
    }
}// end class
