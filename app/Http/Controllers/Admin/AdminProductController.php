<?php
//use Intervention\Image\Facades\Image;
namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RecentProduct;
use App\Categorys;
use DB;

class AdminProductController extends Controller
{
  
    public function showproduct()
    {
        $products = RecentProduct::paginate(3);
        return view('admin.show',compact('products'));
    }

    public function updateproduct(Request $request,$id)
    {
        $product=RecentProduct::find($id);
        return view('admin.updateproduct',compact('product'));  
       
    }
    public function modifyproduct(Request $request,$id)
    {
        $product=RecentProduct::find($id);
        $name=$request->input('name');
        $price=$request->input('price');
        $status=$request->input('status');
        $file=$request->file('image');

        if($request->hasFile('image')) {   
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imgName);
            $product->image = 'img/'.$imgName;
        } 
     DB::table('recent_products')->where('id', '=', $product->id)->update(['name' => $name,'price'=>$price,'status'=>$status,'image'=> $product->image]);
     return redirect('admin/allproducts');    
     // return back();
    }

    public function Addproduct()
    {
        $categories = Categorys::get();
        return view('admin.addproduct',compact('categories'));
    }

    public function Addnewproduct(Request $request)
    {
        $product=new RecentProduct;

        if($request->input('name')&&$request->input('category_id')&&$request->input('price')&&$request->input('status')&&$request->file('image')){
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->status = $request->input('status');
        $product->category_id= $request->input('category_id');
        if($request->hasFile('image')) {    
           
            $imgName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imgName);
            $product->image = 'img/'.$imgName;
        }
        $product->save();
    }
    return redirect('admin/allproducts');
        
      // return back();   
       
    }
    public function delproduct($id)
    {
        $cart=RecentProduct::find($id);
        $cart->delete();
       return back();   
       
    }

}
