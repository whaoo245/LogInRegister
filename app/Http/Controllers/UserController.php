<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = DB::select('select * from users');
        return view('stud_delete_view',['users'=>$users]);
    }

    public function show($Email) {
           
        $users = DB::where('email','=',[$Email])->get();
        return view('edit',['users'=>$users]);
        }

    public function edit(Request $request,$Email) {
        $users = DB::table('users') -> find($Email);
       
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->update();
        echo "Record updated successfully.<br/>";
        echo '<a href = "/table">Click Here</a> to go back.';
     }


    public function delete($Email) {
        DB::delete('delete from users where email = ?',[$Email]);
        echo "Record deleted successfully.";
        echo 'Click Here to go back.';
    }


}