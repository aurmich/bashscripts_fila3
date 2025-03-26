<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Ptv\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * ---
 */
class CreatePtvProfilesTable extends XotBaseMigration
{
    protected ?string $model_class = Profile::class;

    /**
     * db up.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('user_id')->nullable()->index();
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('email')->nullable();
                $table->schemalessAttributes('extra');
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
}
