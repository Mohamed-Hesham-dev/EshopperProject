<?php


namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorys;
use App\RecentProduct;
use DB;

class AddCategoryController extends Controller
{
     public function showcategory(){
        $categories = Categorys::paginate(3);
        return view('admin.showcategories',compact('categories'));
    }
    public function index(){
        return view('admin.addcategory');
    }
    public function Addcategory(Request $request){
        $category=new Categorys;
        if($request->input('name')){
        $category->name = $request->input('name');
       
        $category->save();
    }
    return redirect('admin/AllCategories');
    }
    public function DelCategory($id)
    {
     
        $cartegory=Categorys::find($id);
        $products = RecentProduct::where('category_id','=',$cartegory->id)->with('category')->get();
        $cartegory->delete();
        $products->each->delete();
        return redirect('admin/AllCategories');  
       
    }
}
