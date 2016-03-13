<?php

namespace College;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{
	use Translatable;

//	public $translationModel = \NewsTranslaion::class;

	public $translatedAttributes = ['title'];
	protected $fillable = ['code', 'title', 'text'];

}