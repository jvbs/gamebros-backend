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
/*         $campos = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
   
        $user = User::where('email', $campos['email'])->first();

        // Verifica a senha
        if(!$user || !Hash::check($campos['password'], $user->password)){
            return response()->json(['message' => 'Usuário ou senha inválido'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json(['nome' => $user->name, 'token' => $token], 201)->redirect; */

        //DAQUI PRA BAIXO É VÁLIDO

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
        //return redirect("login")->withSuccess('Login details are not valid');

        

/*         $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)):
            return redirect()->to('dash')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user); */




    }



    public function registration()
    {
        return view('auth.registration');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
