<?php

namespace College;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class News extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $fillable = [
        'title',
        'body',
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];
}
