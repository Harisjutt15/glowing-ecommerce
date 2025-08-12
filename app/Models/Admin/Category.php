<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image_name',
        'image_size',
        'description',
        'image',
        'show_on_home',
    ];

    protected $casts = [
        'show_on_home' => 'boolean'
    ];
      
    public function images()
    {
        return $this->morphMany(Image::class, 'modelable');
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
