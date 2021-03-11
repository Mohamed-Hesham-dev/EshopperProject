<?php

namespace App\Http\Controllers;
use App\RecentProduct;
use Illuminate\Http\Request;
use App\Brand;
use App\Cart;

class ProductListController extends Controller
{
    public function product_list(Request $request)
    {
        $brands=Brand::all();
        $search = $request->input('search');
        $results= RecentProduct::where('name', 'LIKE', "%{$search}%")->get();
        //$count=Cart::count();
    //dd($posts);
        return view('Products\search', compact('results','brands'));
        
    }
}
