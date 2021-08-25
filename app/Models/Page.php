<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'order',
        'content',
    ];

    protected $dates = ['published_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
        return route('pages.show', [$this->slug]);
    }
}
