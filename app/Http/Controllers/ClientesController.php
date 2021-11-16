<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    private $cliente;

    public function __construct(User $cliente)
    {
        $this->cliente = $cliente;
    }

    private $rules = [
        'name' => 'required|between:5,50',
        'cpf' => 'required|between:10,20',
        'email' => 'required|email',
        //'password' => 'required',
    ];

    public function index(Request $request)
    {
        $clientes = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->paginate(10);

        return view('clientes.index', compact('clientes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $role = 'client';

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'role' => $role
        ]);

        return redirect(route('clientes.index'))->with('success', 'Cliente criado com sucesso');

    }

    public function edit($cliente)
    {
        $cliente = $this->cliente->findOrFail($cliente);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $client = User::findOrFail($id);
        if($client){
            $client->name = $request->name;
            $client->cpf = $request->cpf;
            $client->email = $request->email;
            $client->phone = $request->phone;
            //$client->password = $request->password;

            if (!$request->password == '')
            {
                $client->password = $request->password;
            }

            $client->save();

            return redirect(route('clientes.index'))->with('success', 'cliente atualizado com sucesso');
        }
    }

    public function destroy($id)
    {
        $client = User::findOrFail($id);
        if($client){
            $client->delete();
        }

        return redirect(route('clientes.index'))->with('success', 'cliente excluído com sucesso.');
    }
}
