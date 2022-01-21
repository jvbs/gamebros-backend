<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      

    public function loginCustom(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'admin'
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>'admin'])) {
            return redirect()->intended('dash')
                        ->withSuccess('Signed in');
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role'=>'client'])){
            return redirect("login")->withErrors('Usuário sem permissão de acesso');
        }
  
        return redirect("login")->withErrors('Usuário ou senha inválidos');

    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
