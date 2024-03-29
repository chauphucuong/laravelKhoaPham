<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'category';
    protected $fillable = ['id','name','alias','order','parent_id','keywords','description'];

    // public $timestamps = false;

    public function product(){
        return $this->hasMany('App\Product');
    }
}
