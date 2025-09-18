<?php

declare(strict_types=1);

namespace Modules\Ptv\Models\Contracts;

/**
 * Undocumented interface.
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $field_name
 * @property string|null $op
 * @property string|null $value
 * @property string|null $type
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static \Modules\Progressioni\Database\Factories\CriteriEsclusioneFactory factory($count = null, $state = [])
 * @method static Builder|CriteriEsclusione newModelQuery()
 * @method static Builder|CriteriEsclusione newQuery()
 * @method static Builder|CriteriEsclusione query()
 * @method static Builder|CriteriEsclusione whereAnno($value)
 * @method static Builder|CriteriEsclusione whereCreatedAt($value)
 * @method static Builder|CriteriEsclusione whereCreatedBy($value)
 * @method static Builder|CriteriEsclusione whereFieldName($value)
 * @method static Builder|CriteriEsclusione whereId($value)
 * @method static Builder|CriteriEsclusione whereName($value)
 * @method static Builder|CriteriEsclusione whereOp($value)
 * @method static Builder|CriteriEsclusione whereType($value)
 * @method static Builder|CriteriEsclusione whereUpdatedAt($value)
 * @method static Builder|CriteriEsclusione whereUpdatedBy($value)
 * @method static Builder|CriteriEsclusione whereValue($value)
 *
 * @mixin \Eloquent
 */
interface CriteriEsclusioneContract {}
