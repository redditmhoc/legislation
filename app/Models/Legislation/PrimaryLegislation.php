<?php

namespace App\Models\Legislation;

use App\Models\Region;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laragear\Json\Casts\AsJson;
use Spatie\Tags\HasTags;

/**
 * App\Models\Legislation\PrimaryLegislation
 *
 * @property string $id
 * @property string|null $region_id
 * @property string $bill_number
 * @property string $act_number
 * @property int $act_year
 * @property string $title
 * @property string|null $reddit_url
 * @property string $introductory_text
 * @property string|null $commencement_date
 * @property string|null $royal_assent_date
 * @property mixed $metadata
 * @property string|null $explanatory_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereActNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereActYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereBillNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereCommencementDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereExplanatoryNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereIntroductoryText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereRedditUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereRoyalAssentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation withAllTags(\ArrayAccess|\Spatie\Tags\Tag|array $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation withAnyTags(\ArrayAccess|\Spatie\Tags\Tag|array $tags, ?string $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PrimaryLegislation withAnyTagsOfAnyType($tags)
 * @mixin \Eloquent
 */
class PrimaryLegislation extends Model
{
    use HasUuid, HasTags;

    /** @var string */
    protected $table = "primary_legislation";

    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'region_id', 'bill_number', 'act_number', 'act_year', 'title', 'reddit_url', 'introductory_text', 'commencement_date', 'royal_assent_date', 'metadata', 'explanatory_notes'
    ];

    /**
     * Date attributes.
     *
     * @var array
     */
    protected $dates = [
        'royal_assent_date',
        'commencement_date'
    ];

    /**
     * Attribute casts.
     *
     * @var array
     */
    protected $casts = [
        'metadata' => AsJson::class
    ];

    /**
     * Return the relationship for the legislation's region.
     *
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
