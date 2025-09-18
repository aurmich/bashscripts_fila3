<?php

/**
<<<<<<< HEAD
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
=======
 * Definizione dell'interfaccia per i modelli dell'applicazione.
>>>>>>> 0d55b583 (first)
 */

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ModelContract.
 *
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property bool               $is_reclamed
 * @property bool               $table_enable
 * @property PivotContract|null $pivot
 * @property string $tennant_name
 *
 * @method mixed     getKey()
 * @method string    getRouteKey()
 * @method string    getRouteKeyName()
 * @method string    getTable()
 * @method mixed     with($array)
 * @method array     getFillable()
 * @method mixed     fill($array)
 * @method mixed     getConnection()
 * @method mixed     update($params)
 * @method mixed     delete()
 * @method mixed     detach($params)
 * @method mixed     attach($params)
 * @method array     treeLabel()
 * @method array     treeSons()
 * @method int       treeSonsCount()
 * @method array     toArray()
 * @method BelongsTo user()
 * @method mixed     getAttributeValue(string $key)
=======
namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interfaccia ModelContract che deve essere implementata dai modelli.
>>>>>>> 0d55b583 (first)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ModelContract
{
    /**
     * Duplicate the instance and unset all the loaded relations.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return static The model instance without relations
>>>>>>> 0d55b583 (first)
     */
    public function withoutRelations();

    /**
     * Fill the model with an array of attributes. Force mass assignment.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @param array<string, mixed> $attributes Gli attributi da assegnare al modello
     * @return static Il modello stesso
>>>>>>> 0d55b583 (first)
     */
    public function forceFill(array $attributes);

    /**
     * Save the model to the database.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function save(array $options = []);
    /*
         * Save a new model and return the instance. Allow mass-assignment.
         *
         * @return \Illuminate\Database\Eloquent\Model|$this
=======
     * @param array<string, mixed> $options Opzioni per il salvataggio
     * @return bool True se il salvataggio è avvenuto con successo, false altrimenti
     */
    public function save(array $options = []);

    /*
         * Save a new model and return the instance. Allow mass-assignment.
         *
         * @param array<string, mixed> $attributes Gli attributi da assegnare al modello
         * @return static Il nuovo modello creato
>>>>>>> 0d55b583 (first)

        public function forceCreate(array $attributes);
        */

    /**
     * Convert the model instance to an array.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<string, mixed> Il modello convertito in array
>>>>>>> 0d55b583 (first)
     */
    public function toArray();

    /**
     * Get the value of the model's primary key.
     *
<<<<<<< HEAD
     * @return mixed|int|string
=======
     * @return string|int|null Il valore della chiave primaria
>>>>>>> 0d55b583 (first)
     */
    public function getKey();

    /*
     * Add a basic where clause to the query.
     *
     * @param  \Closure|string|array|\Illuminate\Contracts\Database\Query\Expression  $column
     * @param  mixed  $operator
     * @param  mixed  $value
     * @param  string $boolean
<<<<<<< HEAD
     * @return $this
=======
     * @return static
>>>>>>> 0d55b583 (first)

    public function where($column, $operator = null, $value = null, $boolean = 'and');
    */

    /*
     * Execute the query and get the first result or throw an exception.
     *
     * @param  array|string $columns
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>

    public function firstOrFail($columns = ['*']);
    */
}
