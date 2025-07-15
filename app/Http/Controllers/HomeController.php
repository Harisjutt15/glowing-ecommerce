<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data=[
            'categories'=>Category::where('show_on_home',true)->with('images')->take(4)->get(),
            'product_bestsellet'=>Product::where('show_on_home',true)->with('images')->get(),
            'product_new_arrivals'=>Product::where('new_arrival',true)->with('images')->get(),
        ];
        return view('home.index',$data);
    }
}
