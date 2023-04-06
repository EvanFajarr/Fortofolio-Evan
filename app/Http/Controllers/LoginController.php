<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('loginEvan.index');
        
    }
    public function loginEvan(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            ] ,[
                'email'=>'Email wajib diisi',
                'password'=>'Pasword wajib diisi',
            ]);
            $infologin=[
                'email'=>$request->email,
                'password'=>$request->password,
            ];
            if (Auth::attempt($infologin)) {
              
                    return redirect('/skill')->with('success','Berhasil login');
            
            }else{
            return redirect('loginEvan')->withErrors('Username dan Password salah');
            }
      
    }
   public function logout(){
        Auth::logout();
        return redirect('/loginEvan')->withErrors('success','Berhasil Logout');
        }
}
