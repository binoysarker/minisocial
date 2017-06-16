<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;
    protected $fillable = [
    	'user_id','content','live','post_on'
    ];
    protected $dates = ['post_on','deleted_at'];
    // protected $gaurded = ['id'];
    public function setLiveAttribuite($value)
    {
		$this->attributes['live'] = (boolean)($value);    	
    }
    
    public function getShortContentAttribute($value='')
    {
    	return substr($this->content, 0, random_int(60, 150)).' ...';
    }
    public function setPostOnAttribute($value='')
    {
    	$this->attributes['post_on'] = Carbon\Carbon::parse($value);
    }
}
