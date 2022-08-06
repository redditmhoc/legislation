<?php

namespace App\Models\Legislation;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Tags\HasTags;

/**
 * App\Models\Legislation\Type
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Legislation\PrimaryLegislation[] $primaryLegislation
 * @property-read int|null $primary_legislation_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|Type withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type withAnyTagsOfAnyType($tags)
 * @mixin \Eloquent
 */
class Type extends Model
{
    use HasUuid, HasTags;

    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    /**
     * @return HasMany
     */
    public function primaryLegislation(): HasMany
    {
        return $this->hasMany(PrimaryLegislation::class);
    }
}
