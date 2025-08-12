<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Services\ProductService;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    protected $productservice;
    public function __construct(ProductService $product){
        $this->productservice=$product;
    }

    public function index(ProductDataTable $datatable){
        return $datatable->render('admin.product.data-table');

    }
    public function indexTemplate(){
    $product=Product::with('images')->get();
        $data=[
            'products'=>$product,
        ];
        return view('admin.product.index',$data);
    }
    public function create()
    {
        $data=[
            'category'=>Category::select('id','title')->get(),
        ];
        return view('admin.product.add-product',$data);
    }

    public function encrpt(){
        $value=1;
        $encrypt=Crypt::encryptString($value);
        $decrypt=Crypt::decryptString($encrypt);
        $hashed = Hash::make(1);

        return [$value , $encrypt  ,$decrypt,$hashed];
    }
    public function store(Request $request)
    {
        $validate=$request->validate([
            // 'title' => 'required| unique:products,title',
            'title' => 'required',
            'short_description' => 'required',
            'price' => 'required|min:1',
            'quantity' => 'required|min:1',
            // 'discount_price' => 'required',
        ]);

            try{
                $this->productservice->store($request);
                
            }catch(\Throwable $th){
                
                return redirect()->back()->withErrors($th->getMessage());
            }
            
            return redirect()->route('admin.product.index')->withSuccess('Operation Successfull');
        
    }
    public function edit($id)
    {
        $products = Product::where('id', $id)->with('images')->first();
        $data=[
            'category'=>Category::select('id','title')->get(),
            'product'=>$products,

        ];

        return view('admin.product.add-product',$data);
    }
}
