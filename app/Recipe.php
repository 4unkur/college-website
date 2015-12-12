<?php

namespace College;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Recipe extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $fillable = [
        'title',
        'body',
        'status',
        'user_id',
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];

//    public static function create(array $attributes = [])
//    {
//        $attributes['user_id'] = \Auth::user()->id;
//        parent::create($attributes);
//    }

    public function user()
    {
        return $this->belongsTo('College\User');
    }
}
