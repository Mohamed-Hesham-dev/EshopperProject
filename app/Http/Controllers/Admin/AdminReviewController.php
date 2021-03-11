<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RecentProduct;
use App\Review;
use DB;


class AdminReviewController extends Controller
{
    public function showreview()
    {
        $product = RecentProduct::get();
        //dd($product);
         $reviews = Review::with('product')->get()->unique('product_id');
       // dd($reviews);
        // $uniques = $reviews->paginate(3);
        return view('admin.showreview',compact('reviews'));
    }

    public function approvereview(Request $request,$id)
    {

        $product = RecentProduct::find($id);
        $reviews = Review::where('product_id','=',$product->id)->with('user')->get();
        return view('admin.approvereview',compact('reviews'));
    }

}
