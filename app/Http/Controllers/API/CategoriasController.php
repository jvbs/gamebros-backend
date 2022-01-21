<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
use App\Http\Resources\CategoriesResource;

class CategoriasController extends Controller
{

    private $rules = [
        'name' => 'required|between:5,50',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->get();
        return response()->json(['Categorias encontradas:', CategoriesResource::collection($data)]);
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

        $categoria = Category::create($request->all());

        return response()->json(['Categoria criada com sucesso.', new CategoriesResource($categoria)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Category::find($id);
        if (is_null($categoria)) {
            return response()->json('Dados não encontrados.', 404);
        }
        $produtos = $categoria->products()->get();
        return response()->json(['categorias' => $categoria, 'produtos' => $produtos]);
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

        $categoria = Category::findOrFail($id);
        if($categoria){
            $categoria->name = $request->name;

            $categoria->save();

            return response()->json(['Categoria atualizada com sucesso:', new CategoriesResource($categoria)]);
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
        $categoria = Category::findOrFail($id);
        if($categoria){
            $categoria->delete();
        }

        return response()->json('Categoria excluída com sucesso.');
    }
}
