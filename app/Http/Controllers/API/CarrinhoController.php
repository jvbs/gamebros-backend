<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
use App\Http\Resources\CategoriesResource;

class CarrinhoController extends Controller
{

    private $rules = [
        'user_id' => 'required|integer',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->get();
        return response()->json(['Carrinhos encontrados:', CategoriesResource::collection($data)]);
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

        $carrinho = Category::create($request->all());

        return response()->json(['carrinho criada com sucesso.', new CategoriesResource($carrinho)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrinho = Category::find($id);
        if (is_null($carrinho)) {
            return response()->json('Dados não encontrados.', 404);
        }
        return response()->json([new CategoriesResource($carrinho)]);
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

        $carrinho = Category::findOrFail($id);
        if($carrinho){
            $carrinho->name = $request->name;

            $carrinho->save();

            return response()->json(['carrinho atualizada com sucesso:', new CategoriesResource($carrinho)]);
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
        $carrinho = Category::findOrFail($id);
        if($carrinho){
            $carrinho->delete();
        }

        return response()->json('carrinho excluída com sucesso.');
    }
}
