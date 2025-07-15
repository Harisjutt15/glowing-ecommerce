<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'image_name',
        'modelable_type',
        'modelable_id',
        'image_size',
    ];

    public function morphable(){
        return $this->morphTo();
    }
}
