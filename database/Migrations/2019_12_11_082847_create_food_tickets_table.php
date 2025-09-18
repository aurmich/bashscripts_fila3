<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateFoodTicketsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->integer('id', true);
                $table->integer('ente')->nullable()->index();
                $table->integer('matr')->nullable()->index();
                $table->string('cognome', 50)->nullable();
                $table->string('nome', 50)->nullable();
                $table->integer('propro')->nullable();
                $table->integer('posfun')->nullable();
                $table->string('categoria_eco');
                $table->integer('posiz')->nullable();
                $table->integer('posiz_txt');
                $table->integer('stabi')->nullable();
                $table->string('stabi_txt', 50)->nullable();
                $table->integer('repar')->nullable();
                $table->string('repar_txt', 50)->nullable();
                $table->boolean('is_regionale')->nullable();
                $table->integer('n_diritto')->nullable();
                $table->integer('n_mensa')->nullable();
                $table->integer('n_dati')->nullable();
                $table->integer('n_dati_tot')->nullable();
                $table->integer('n_resi')->nullable();
                $table->integer('n_resi_tot')->nullable();
                $table->dateTime('giorno')->nullable()->index();
                $table->integer('mese')->nullable()->index();
                $table->integer('anno')->nullable()->index();
                $table->text('note')->nullable();
                $table->timestamps();
                $table->string('created_by', 50)->nullable();
                $table->dateTime('updated_wstr02f_at')->nullable();
                $table->dateTime('updated_wmen00f_at')->nullable();
                $table->dateTime('updated_wstr01lx_at')->nullable();
                $table->string('updated_by', 50)->nullable();
                $table->softDeletes();
                $table->string('deleted_by', 50)->nullable();
                $table->integer('disci1');
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('auth_user_id')) {
                    return;
                }

                if ($this->hasColumn('user_id')) {
                    return;
                }

                $table->renameColumn('auth_user_id', 'user_id');
            }
        );
    }
}
