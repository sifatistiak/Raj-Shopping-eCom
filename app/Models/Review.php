<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name','email','message','rating','status','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
