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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*     public function index()
    {
        $data = Category::latest()->get();
        return response()->json(['Carrinhos encontrados:', CategoriesResource::collection($data)]);
    }

    public function cart(Request $request)
    {
        $user = $request->id;

        $cart = $user->cart;

        if ($cart->count() > 0) {

            $products = [];

            foreach ($cart as $c) {

                $product = Product::find($c->product_id);
                //dd($c);

                //dd($c);
                $amount = ($c->amount);
                $product->amount = $amount;
                array_push($products, $product);
            }

            //dd($products);

            return response()->json(['products' => $products]);

        } else {

            return response()->json(["error" => "Não há produtos no carrinho"], 400);
        }
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

        // return response()->json($carrinhoAtivo);

        // $product = Product::create($request->all());

        // return response()->json(new ProductsResource($product));

        // if (!$request->product_id) {

        //     return response()->json(["error" => "Requisição com corpo incompleto"], 400);
        // }

        // $prod = Product::all()->where('id', $request->product_id)->count();

        // if ($prod > 0) {

        //     //$user = auth()->user()->id;

        //     $checkCart = Cart::all()->where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();

        //     if ($checkCart) {

        //         $amount = $checkCart->amount;

        //         $checkCart->update(['amount' => $amount + 1]);

        //         return response()->json(["success" => "Produto adicionado no carrinho"]);
        //     } else {

        //         Cart::create([
        //             'user_id' => $request->user_id,
        //             'product_id' => $request->product_id,
        //             'amount' => $request->amount
        //         ]);

        //         return response()->json(["success" => "Produto adicionado no carrinho"]);
        //     }

        // } else {

        //     return response()->json([
        //         "error" => "Este Produto não existe na base de dados",
        //         "product_id" => "Is invalid",
        //         "mesage" => "Impossível adicionar no carrinho"
        //     ], 401);
        // }
    }

    // public function removeProdOne(Request $request)
    // {

    //     if (!$request->product_id) {

    //         return response()->json(["Error" => "Dados incompletos"], 400);
    //     }

    //     //$user = auth()->user()->id;

    //     $checkCart = Cart::all()->where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();

    //     if ($checkCart == null) {

    //         return response()->json(["Error" => "Carrinho não encontrado"], 404);
    //     }

    //     if ($checkCart->amount > 1) {

    //         $amount = $checkCart->amount;

    //         $checkCart->update(['amount' => $amount - 1]);

    //     } else {

    //         $checkCart->delete();
    //     }
    //     $product = Product::findOrFail($checkCart->product_id);
    //     return response()->json(["success" => "{$product->name} uma unidade removida com sucesso"]);
    // }

    // public function removeProd(Request $request)
    // {
    //     if (!$request->product_id) {

    //         return response()->json(["Error" => "Dados incompletos"], 400);
    //     }

    //     //$user = auth()->user()->id;

    //     $checkCart = Cart::all()->where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();

    //     if ($checkCart == null) {

    //         return response()->json(["Error" => "Carrinho não encontrado"], 404);
    //     }

    //     if ($checkCart->amount > 0) {
    //         $checkCart->delete();
    //     }
    //     $product = Product::findOrFail($checkCart->product_id);
    //     return response()->json(["success" => "{$product->name} removido do carrinho com sucesso"]);
    // }


    // public function removeCart(int $user)
    // {

    //     //$user = auth()->user()->id;

    //     $this->delete($user);

    //     return response()->json(["success" => "Carrinho Vazio"]);
    // }



    // private function delete(int $user)
    // {

    //     //remove produto do carrinho do cliente
    //     $removeProducts = Cart::all()->where('user_id', $user);

    //     foreach ($removeProducts as $products) {
    //         $products->delete();
    //     }
    // }

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
        //return response()->json($produtosCarrinho);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), $this->rules);

    //     if($validator->fails()){
    //         return response()->json($validator->errors());
    //     }

    //     $carrinho = Category::findOrFail($id);
    //     if($carrinho){
    //         $carrinho->name = $request->name;

    //         $carrinho->save();

    //         return response()->json(['carrinho atualizada com sucesso:', new CategoriesResource($carrinho)]);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtosCarrinho = DB::table('cart')
            ->leftJoin('cart_product', 'cart.id', '=', 'cart_product.cart_id')
            ->leftJoin('products', 'cart_product.product_id', '=', 'products.id')
            ->select('cart.user_id', 'cart_product.id as cart_product_id', 'cart_product.amount', 'products.*')
            ->where([
                ['cart.status', 1],
                ['cart.user_id', $id]
            ])
            ->get();

        if($produtosCarrinho){
            DB::table('cart_product')->where('product_id', $id)->delete();
        }

        return response()->json('Produto excluído do carrinho com sucesso.');
    }
}
