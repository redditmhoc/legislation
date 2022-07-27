<?php

namespace App\Models;

use App\Models\Legislation\PrimaryLegislation;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Region
 *
 * A region that legislation can be relevant in.
 *
 * @property string $id
 * @property string $name
 * @property string|null $icon_uri
 * @property string|null $subreddit_url
 * @property string|null $spreadsheet_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereIconUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereSpreadsheetUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereSubredditUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Region extends Model
{
    use HasUuid;

    /** @var string[]  */
    protected $fillable = [
        'name', 'icon_uri', 'subreddit_url', 'spreadsheet_url'
    ];

    /**
     * Return the primary legislation assigned to this region.
     *
     * @return HasMany
     */
    public function primaryLegislation(): HasMany
    {
        return $this->hasMany(PrimaryLegislation::class);
    }
}
