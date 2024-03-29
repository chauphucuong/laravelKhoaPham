<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table = 'product_image';
    protected $fillable = ['images','products_id'];

    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Products');
    }
}
