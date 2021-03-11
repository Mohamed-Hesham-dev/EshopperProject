<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Cart;
use Illuminate\Support\Facades\Hash;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users=User::all();
        return view('Users/my-account',compact('users'));
    }

   public function update($id,Request $request)
    {
       // $users=User::all();
       // $user = Auth::user($id);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->has('password')) {
            $user -> password = Hash::make($request->input('password'));
        }
    $user->save();
    return redirect()->back();
   // return view('Users/my-account',compact('users'));
    }
    
}
