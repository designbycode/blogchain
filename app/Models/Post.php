<?php

namespace App\Models;

use App\Traits\Live;
use Conner\Likeable\Likeable;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<PostFactory> */
    use HasFactory, SoftDeletes, Likeable, Live, HasTags, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'live',
        'category_id',
    ];

    protected $casts = [
        'live' => 'boolean',
        'published' => 'timestamp',
        'category_id' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('posts')
            ->singleFile()
            ->useFallbackUrl('https://placehold.co/600x400')
            ->useFallbackUrl('https://placehold.co/600x400', 'card')
            ->useFallbackUrl('https://placehold.co/1200x800', 'main')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('card')
                    ->width(300)
                    ->height(200);

                $this
                    ->addMediaConversion('main')
                    ->width(1200)
                    ->height(800);
            });

    }

}
