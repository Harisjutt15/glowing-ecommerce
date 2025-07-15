<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Category;

class CategoryService
{

    public static function store($request)
    {
        $data = [
            'title' => $request->title ?? '',
            'slug' => Str::slug($request->title ?? ''),
            'description' => $request->description ?? '',
            'show_on_home' => $request->show_on_home ?? false,

        ];
        $category = Category::UpdateOrCreate([
            'id' => $request->id,

        ], $data);
        if ($request->file('images')) {
            foreach ($request->images as $key => $image) {
                // dd($image);
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('images'), $imageName);
                $sizeInBytes = filesize($path);
                // $sizeInBytes=$path->getSize();  // This way is correct as well
                $sizeInMB = round($sizeInBytes / 1024 / 1024, 2) . ' MB';
                // dd($sizeInMB);
                $category->images()->create([
                    'image_name' => $imageName,
                    'image_size' => $sizeInMB,
                ]);
            }
        }
    }
}
