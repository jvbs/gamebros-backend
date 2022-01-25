<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Http\Resources\CategoriesResource;
use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{

    private $rules = [
        'user_id' => 'required|integer',
        'product_id' => 'required|integer',
    ];

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
            return response()->json(
                ["message" => "Ocorreu um erro nos dados informados."]
            );
        }

        // verificando se usuário ainda tem carrinho ativo
        $carrinhoAtivo = DB::table('cart')
            ->where([
                ['user_id', $request->user_id],
                ['status', 1]
            ])
            ->first();

        if($carrinhoAtivo){
            DB::table('cart_product')->insert([
                'cart_id' => $carrinhoAtivo->id,
                'product_id' => $request->product_id,
                'amount' => 1
            ]);

            return response()->json([
                "message" => "Produto adicionado ao carrinho."
            ]);
        } else {
            $cartId = DB::table('cart')->insertGetId([
                'user_id' => $request->user_id,
                'status' => 1
            ]);

            DB::table('cart_product')->insert([
                'cart_id' => $cartId,
                'product_id' => $request->product_id,
                'amount' => 1
            ]);

            return response()->json([
                "message" => "Produto adicionado ao carrinho."
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtosCarrinho = DB::table('cart')
            ->leftJoin('cart_product', 'cart.id', '=', 'cart_product.cart_id')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'cart.id as cart_id',
                'cart.user_id',
                'cart_product.id as cart_product_id',
                'cart_product.amount',
                'products.*',
                'categories.name as category_name'
                )
            ->where([
                ['cart.status', 1],
                ['cart.user_id', $id]
            ])
            ->get();

        (float)$total = 0;
        foreach ($produtosCarrinho as $produto) {
            $price = (float)$produto->price;
            $total = $total + $price;
        }

        return response()->json([
            "totalCarrinho" => $total,
            "produtos" => $produtosCarrinho
        ]);
    }

    public function removerProdutoCarrinho(Request $request){
        $produtosCarrinho = DB::table('cart')
            ->leftJoin('cart_product', 'cart.id', '=', 'cart_product.cart_id')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->select('cart.user_id', 'cart_product.id as cart_product_id', 'cart_product.amount', 'products.*')
            ->where([
                ['cart.status', 1],
                ['cart.user_id', $request->user_id]
            ])
            ->get();


        if(count($produtosCarrinho) > 0){
            DB::table('cart_product')->where('id', $request->product_id)->delete();

            return response()->json([
                'message' => 'Produto excluído do carrinho com sucesso.']
            );
        }

        return response()->json();
    }

    // public function destroy($id)
    // {
    //     return response()->json($id);


    // }
}
