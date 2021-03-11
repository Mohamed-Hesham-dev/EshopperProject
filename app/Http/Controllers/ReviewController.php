<?php

namespace App\Http\Controllers;
use App\Providers\View;
use Illuminate\Http\Request;
use App\Cart;
use App\RecentProduct;
use App\Review;
use DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addreview(Request $request,$id){

        
            $product = RecentProduct::find($id);
            
            $review=new Review;
            $review->user_id=Auth::user()->id;
            $review->product_id = $product->id;
            $review->review = $request->input('review');
           // dd( $review->review);
            $review->save();
           // $reviews = Review::all();
           return back();
           //return view('Cart/cart',compact('carts','sum'));
    
       
   
}



}
