<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        return view('home');
    }

    public function view(){
        $users = DB::select('select * from users');
        return view('viewRegister',['users'=>$users]);
    }

        public function show($id) {
           
        $users = User::where('id','=',[$id])->get();
        return view('update',['users'=>$users]);
        }
        public function edit(Request $request,$id) {
            $users = User::find($id);
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->update();
            echo "Record updated successfully.<br/>";
            echo '<a href = "/table">Click Here</a> to go back.';
     }

     public function delete(Request $request,$id) {
        $users = User::find($id);
        
        $users->delete();
        echo "Record delete successfully.<br/>";
        echo '<a href = "/table">Click Here</a> to go back.';
    }
}
