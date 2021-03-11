<?php

namespace App\Http\Controllers;
use App\RecentProduct;
use App\Categorys;
use App\Brand;
use Illuminate\Http\Request;

class Category2Controller extends Controller
{
    public function showcatecory($id){
        $product = Categorys::find($id);
        $products = RecentProduct::where('category_id','=',$product->id)->with('category')->get();
        $brand=Brand::all();
        return view('Category/category',compact('products','brand'));
    }
}
