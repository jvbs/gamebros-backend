<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use App\Http\Resources\ProductsResource;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{

    private $rules = [
        'name' => 'required|between:5,50',
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'description' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|between:1,100',
        'stock' => 'required|integer|between:1,9999',
        'sku' => 'required',
        'category_id' => 'required|integer',
        'subCategory' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->get();
        return response()->json(ProductsResource::collection($data));
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

        $product = Product::create($request->all());

        return response()->json(new ProductsResource($product));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::find($id);
        $product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->first();
        if (is_null($product)) {
            return response()->json('Dados não encontrados.', 404);
        }
        // return response()->json(new ProductsResource($product));
        return response()->json($product);

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

        $product = Product::findOrFail($id);
        if($product){
            $product->name = $request->name;
            $product->image = $request->image;
            $product->description = $request->description;
            $product->type = $request->type;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->stock = $request->stock;
            $product->warranty = $request->warranty;
            $product->category_id = $request->category_id;

            $product->save();

            return response()->json(new ProductsResource($product));
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
        $product = Product::findOrFail($id);
        if($product){
            $product->delete();
        }

        return response()->json('Produto excluído com sucesso.');
    }
}
