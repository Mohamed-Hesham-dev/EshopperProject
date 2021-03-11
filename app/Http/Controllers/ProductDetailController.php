<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RecentProduct;
use App\Brand;
use App\Cart;
use App\Review;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class ProductDetailController extends Controller
{
    public function product_detail($id)
    {
        $product = RecentProduct::find($id);
       
            $reviews = Review::where('product_id','=',$product->id)->with('user')->get();
            $reviewcount = Review::where('product_id','=',$product->id)->with('user')->count();

       
       
        return view('Products\product_detail',compact('product','reviews','reviewcount'));
    }

  }
