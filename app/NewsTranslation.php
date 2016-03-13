<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}