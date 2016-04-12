<?php

namespace College;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    use Translatable;
    /**
     * Array with the fields translated in the Translation table.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'content'];
    /**
     * @var array
     */
    protected $fillable = ['slug', 'status'];


    public function setSlugAttribute ($value)
    {
        $count = self::where('slug', $value)->count();
        $this->attributes['slug'] = empty($count) ? $value : $value . $count . rand(1, 10);
    }
}
