<?php
namespace App\Services;
use Illuminate\Support\Str;
use App\Models\Admin\Product;

class ProductService{
    public static function store($request){
        $data = [
            'title' => $request->title ?? '',
            'slug' => Str::slug($request->title ?? ''),
            'short_description' => $request->short_description ?? '',
            'price' => $request->price ?? '',
            'quantity' => $request->quantity ?? '',
            'discount_price' => $request->discount_price ?? '',
            'show_on_home' => $request->show_on_home ?? false,
            'new_arrival' => $request->new_arrival ?? false,

        ];
        $product = Product::UpdateOrCreate([
            'id' => $request->id,

        ], $data);
        if($request->file('product_images')){
            foreach($request->product_images as $key => $image){
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->move(public_path('images'), $imageName);
                $sizeInBytes = filesize($path);
                // $sizeInBytes=$path->getSize();  // This way is correct as well
                $sizeInMB = round($sizeInBytes / 1024 / 1024, 2) . ' MB';
                $product->images()->create([
                    'image_name' => $imageName,
                    'image_size' => $sizeInMB,
                ]);
            }
        }

        if($request->has('categories')){
            $product->categories()->detach();
            foreach($request->categories as $category){
                $product->categories()->attach($category);

            }
        }

    }
}