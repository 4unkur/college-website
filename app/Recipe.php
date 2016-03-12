<?php

namespace College;

use Illuminate\Database\Eloquent\Model;


class Recipe extends Model
{

    protected $fillable = [
        'title',
        'body',
        'status',
        'user_id',
        'image',
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
