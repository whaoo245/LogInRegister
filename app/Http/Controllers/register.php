<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\register;
use App\Models\user;
use validator;

class register extends Controller
{
    public function insertform()
    {
        return view('Signup');
    }

    public function insert(Request $request)
    {
        $request -> validate([
            'mail' => 'email',
            'psw'  => 'required_with:comfirmPsw|same:comfirmPsw'
        ]);

        $Name = $request->input('uname');
        $Email = $request->input('mail');
        $Pws = $request->input('psw');
        $ConfirmPassword = $request->input('comfirmPsw');
        $data=array('name'=>$Name,"email"=>$Email,"password"=>$Pws,"remember_token"=>$ConfirmPassword);
        DB::table('users')->insert($data);

        echo "Record inserted.<br/>";
        echo "You may <a href =/Login >login</a> now";
    }   
    public function login()
    {
        return view('login');
    }


    public function checklogin(Request $request)
    {
        $user = user::where('mail','=',$request->email)->first();

        if($user)
        {
            $hPassword = Hash::make($user->password);
            if (Hash::check($request->password,$hPassword))
            {
                $request->session()->put('loginId', $user->id);
            }
            else
            {
                return back()->with('error','This password is invalid!');
            }

        }
        
        else
        {
            return back()->with('error','This email is invalid!');
        }
    }
}

?>