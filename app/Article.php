<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'user_id','content','live','post_on'
    ];
    // protected $gaurded = ['id'];
    public function setLiveAttribuite($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }
}
