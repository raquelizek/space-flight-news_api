<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Articles extends Model
{

    protected $collection = 'articles';

    protected $fillable = [
        "featured",
        "title",
        "url",
        "imageUrl",
        "newsSite",
        "summary",
        "publishedAt",
        "launches",
        "events"
    ];
}
