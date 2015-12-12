<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'body',
        'status',
    ];
}
