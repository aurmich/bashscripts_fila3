<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Illuminate\Support\Carbon;
use Modules\Ptv\Models\Message as PtvMessageModel;

/**
 * Modules\IndennitaResponsabilita\Models\Message.
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $title
 * @property string|null $txt
 * @property string|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $parent_id
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, Message> $children
 * @property-read int|null $children_count
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
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereAnno($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereCreatedBy($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereDepth($operator, $value = null)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereParentId($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereTitle($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereTxt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereType($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereUpdatedAt($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message whereUpdatedBy($value)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message withGlobalScopes(array $scopes)
 * @method static \Staudenmeir\LaravelAdjacencyList\Eloquent\Builder|Message withRelationshipExpression($direction, callable $constraint, $initialDepth, $from = null, $maxDepth = null)
 *
 * @mixin \Eloquent
 */
class Message extends PtvMessageModel
{
    protected $connection = 'indennita_responsabilita'; // this will use the specified database connection
}
