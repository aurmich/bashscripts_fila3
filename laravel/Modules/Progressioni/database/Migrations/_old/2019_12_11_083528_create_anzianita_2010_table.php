<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateAnzianita2010Table.
 */
class CreateAnzianita2010Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anzianita_2010', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('ente')->unsigned()->nullable();
            $table->integer('matr')->unsigned()->nullable();
            $table->string('cognome', 200)->nullable();
            $table->string('nome', 200)->nullable();
            $table->integer('propro')->unsigned()->nullable();
            $table->integer('posfun')->unsigned()->nullable();
            $table->integer('posiz')->unsigned()->nullable();
            $table->string('lista_stabi', 100)->nullable();
            $table->text('lista_prog')->nullable();
            $table->integer('gg_ente_nopropro_noposfun')->unsigned()->nullable();
            $table->integer('gg_ente_nopropro_posfun')->unsigned()->nullable();
            $table->integer('gg_ente_propro_noposfun')->unsigned()->nullable();
            $table->integer('gg_ente_propro_posfun')->unsigned()->nullable();
            $table->integer('gg_asz_nopropro_noposfun')->unsigned()->nullable();
            $table->integer('gg_asz_nopropro_posfun')->unsigned()->nullable();
            $table->integer('gg_asz_propro_noposfun')->unsigned()->nullable();
            $table->integer('gg_asz_propro_posfun')->unsigned()->nullable();
            $table->integer('gg_altroente_nopropro_noposfun')->unsigned()->nullable()->default(0);
            $table->integer('gg_altroente_nopropro_posfun')->unsigned()->nullable();
            $table->integer('gg_altroente_propro_noposfun')->unsigned()->nullable();
            $table->integer('gg_altroente_propro_posfun')->unsigned()->nullable();
            $table->string('giorni_ponderati', 100)->nullable();
            $table->string('punteggio', 100)->nullable();
            $table->string('ha_diritto', 10)->nullable();
            $table->text('motivo_escluso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('anzianita_2010');
    }
}
