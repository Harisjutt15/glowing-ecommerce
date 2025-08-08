<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\catDataTable;
use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Services\CategoryService;
use catDataTable as GlobalCatDataTable;

class CategoryController extends Controller
{
   protected $categoryservice;
   public function __construct(CategoryService $service) {
        $this->categoryservice = $service;
    }
    public function index()
    {
        $data = [
            'categories' => Category::orderBy('created_at', 'asc')->get(),
        ];
        return view('admin.category.category', $data);
    }

    public function create()
    {
        return view('admin.category.add-category');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required| unique:products,title',
            'description' => 'required',
            // 'price' => 'required|min:1',
            // 'quantity' => 'required|min:1',
            // 'discount_price' => 'required',
        ]);
        try {
            $this->categoryservice->store($request);     
        } catch (\Throwable $th) {
            
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->route('admin.category.index');
    }
    public function edit($id)
    {
        $category = Category::where('id', $id)->with('images')->first();

        return view('admin.category.add-category')->with('category', $category);
    }

    public function delete(Category $id)
    {
        // dd($id->title);
        // $category=Category::find($id);
        // if($category){
        $id->delete();
        // }
        return redirect()->back();
    }
    function deleteImage($id)
    {
        // dd()
        $image = Image::where('id', $id)->first();
        if ($image) {
            $image_path = public_path() . '/images/' . $image->image_name;
            unlink($image_path);
            $image->delete();
            return response()->json([
                'success' => true,
                'message' => 'Media Deleted'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => "Somethingwe went wrong while deleting the Media"
        ]);
    }

    public function download($id)
    {
        $image = Image::where('id', $id)->first();
        if ($image) {
            $path = public_path('images/' . $image->image_name);

            if ($path) {
                return response()->download($path, $image->image_name);
            }
        }
    }

    public function datatable(CategoryDataTable $datatable){
        return $datatable->render('admin.category.datatable');
    }
}
