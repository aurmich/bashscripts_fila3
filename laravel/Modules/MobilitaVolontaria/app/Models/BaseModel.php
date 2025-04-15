<?php

declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
// ---------- traits
use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
// use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model {
    use HasFactory;
    // use Searchable;
    // use Cachable;
    use Updater;

    protected $connection = 'mobilita_volontaria'; // this will use the specified database connection

    /**
     * @var list<string>
     */
    protected $fillable = ['id'];
    
    /**
     * @var array<string, string>
     */
    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * @var bool
     */
    public $incrementing = true;
    
    /**
     * @var list<string>
     */
    protected $hidden = [
        // 'password'
    ];
    
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        // Utilizziamo il modello standard di Laravel senza dipendere da FactoryService
        $parts = explode('\\', static::class);
        $modelName = end($parts);
        
        // Gestione sicura della posizione dell'ultimo backslash
        $position = strrpos(static::class, '\\');
        if ($position === false) {
            $namespace = '';
        } else {
            $namespace = substr(static::class, 0, $position);
        }
        
        $factoryNamespace = $namespace . '\\Database\\Factories\\' . $modelName . 'Factory';
        
        if (class_exists($factoryNamespace)) {
            return app($factoryNamespace);
        }
        
        return Factory::factoryForModel(static::class);
    }
}
