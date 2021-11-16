<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    private $usuario;

    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }

    private $rules = [
        'name' => 'required|between:5,50',
        'cpf' => 'required|between:10,20',
        'email' => 'required|email',
        //'password' => 'required',
    ];

    public function index(Request $request)
    {
        $usuarios = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->paginate(10);

        return view('usuarios.index', compact('usuarios'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $role = 'admin';

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'role' => $role
        ]);

        return redirect(route('usuarios.index'))->with('success', 'Usuário criado com sucesso');

    }

    public function edit($usuario)
    {
        $usuario = $this->usuario->findOrFail($usuario);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::findOrFail($id);
        if($user){
            $user->name = $request->name;
            $user->cpf = $request->cpf;
            $user->email = $request->email;
            $user->phone = $request->phone;
            //$user->password = $request->password;

            if (!$request->password == '')
            {
                $user->password = $request->password;
            }

            $user->save();

            return redirect(route('usuarios.index'))->with('success', 'Usuario atualizado com sucesso');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
        }

        return redirect(route('usuarios.index'))->with('success', 'Usuario excluído com sucesso.');
    }
}
