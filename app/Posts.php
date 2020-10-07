<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
	use SoftDeletes;

    protected $primaryKey = 'id';

    //public $incrementing = false;

	protected $fillable = ['judul','category_id','content','gambar','slug','users_id'];

    public function category(){
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tags');
    }

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
