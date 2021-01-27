<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewsPost
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $image
 * @property string|null $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\NewsCategory $category
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewsPost extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'description'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id', 'id');
    }
}
