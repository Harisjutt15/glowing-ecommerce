<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'quantity',
        'price',
        'discount_price',
        'show_on_home',
        'new_arrival',

    ];

   public function images(){
        return $this->morphMany(Image::class,'modelable');
    }
  
    public function categories(){
        return $this->belongsToMany(Category::class);
        // return $this->belongsToMany(Category::class, 'category_product',
        //  'product_id','category_id');
    }
}
