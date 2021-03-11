<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Slider;
use App\category;
use App\Categorys;
use App\Feature;
use App\RecentProduct;
use App\Cart;
//use App\RecentProduct;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $brands=Brand::all();
        $sliders=Slider::all();
        $categorys=Category::all();
        $categorys2=Categorys::all();
        $features=Feature::all();
        $recentproducts=RecentProduct::all();
        $products = RecentProduct::paginate(3);
       // $count=Cart::count();
        return view('index' , compact('brands','sliders','categorys','features','recentproducts','products','categorys2'));    
    }
}
