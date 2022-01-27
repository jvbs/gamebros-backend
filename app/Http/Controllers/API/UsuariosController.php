<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    private $rules = [
        'name' => 'required|between:5,50',
        'email' => 'required|email',
        'password' => 'required',
        'cpf' => 'required|string',
        'phone' => 'integer'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->get();
        return response()->json(['Usuários encontrados:', UsersResource::collection($data)]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
             return response()->json([["error" => "Credenciais incorretas."]], 401);
        }

        $user->token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'token' => $user->token,
            'id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'cpf' => $user->cpf,
            'msg' => $user->email . " " . "logado no sistema",
            'status' => "Sucesso",
        ]);
    }

    public function logout(Request $request){

        auth()->user()->tokens()->delete();

        return ['message' => 'Deslogado'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $newRequest = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "cpf" => $request->cpf,
            "phone" => $request->phone,
            "role" => "client"
        ];

        $user = User::create($newRequest);

        return response()->json([
                "message" => "Usuário criado com sucesso."
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('Dados não encontrados.', 404);
        }
        return response()->json([new UsersResource($user)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::findOrFail($id);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return response()->json(['Usuário atualizado com sucesso:', new UsersResource($user)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
        }

        return response()->json('Usuário excluído com sucesso.');
    }
}
