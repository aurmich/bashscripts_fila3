<?php

declare(strict_types=1);

namespace Modules\Ptv\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

/**
 * Modules\Ptv\Models\Message.
 *
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, Message> $children
 * @property-read int|null $children_count
 * @property-read mixed $type
 * @property-read Message|null $parent
 *
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message breadthFirst()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message depthFirst()
 * @method static \Modules\Ptv\Database\Factories\MessageFactory factory($count = null, $state = [])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message getExpressionGrammar()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message hasChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message hasParent()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message isLeaf()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message isRoot()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message newModelQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message newQuery()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message query()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message tree($maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message treeOf(\Illuminate\Database\Eloquent\Model|callable $constraint, $maxDepth = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 *
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $ancestors The model's recursive parents.
 * @property-read int|null $ancestors_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $ancestorsAndSelf The model's recursive parents and itself.
 * @property-read int|null $ancestors_and_self_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $bloodline The model's ancestors, descendants and itself.
 * @property-read int|null $bloodline_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $childrenAndSelf The model's direct children and itself.
 * @property-read int|null $children_and_self_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $descendants The model's recursive children.
 * @property-read int|null $descendants_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $descendantsAndSelf The model's recursive children and itself.
 * @property-read int|null $descendants_and_self_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $parentAndSelf The model's direct parent and itself.
 * @property-read int|null $parent_and_self_count
 * @property-read \Modules\Ptv\Models\Message|null $rootAncestor The model's topmost parent.
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $siblings The parent's other children.
 * @property-read int|null $siblings_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection|\Modules\Ptv\Models\Message[] $siblingsAndSelf All the parent's children.
 * @property-read int|null $siblings_and_self_count
 *
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message doesntHaveChildren()
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $txt
 * @property int|null $anno
 * @property string|null $post_type
 * @property int|null $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereAnno($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereCreatedBy($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message wherePostId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message wherePostType($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereTitle($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereTxt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereType($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereUpdatedBy($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereUserId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> all($columns = ['*'])
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, static> get($columns = ['*'])
 *
 * @mixin \Eloquent
 */
class Message extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    // protected $table = 'messages';
    // public $timestamps= false;
    protected $fillable =
        [
            'id',
            'parent_id',
            'type',
            'title',
            'txt',
            'anno',
        ];

    public function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'parent_id' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',

        ];
    }

    // --- mutators ---
    public function getTypeAttribute($value)
    {
        if ($value === Str::slug($value, '_')) {
            return $value;
        }

        $value = Str::slug($value, '_');
        $this->type = $value;
        $this->save();

        return $value;
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
}
