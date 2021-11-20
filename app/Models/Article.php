<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'published_at',
        'seo_keywords',
        'seo_descriptions',
        'author_id',
    ];

    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function path()
    {
        return route('articles.show', [$this->published_at->year, $this->published_at->month, $this->published_at->day, $this->slug]);
    }

    public function getFirstParagraphAttribute()
    {
        $start = 0;

        // looking for a paragraph tag
        $pattern = "/(<p>)|(<p )/";
        preg_match($pattern, $this->content, $matches, PREG_OFFSET_CAPTURE);
        if (is_array($matches)) {
            $start = $matches[0][1];
        }
        
        return substr($this->content, $start, strpos($this->content, '</p>')+4);
    }
}
