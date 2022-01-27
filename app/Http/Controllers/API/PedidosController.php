<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
// use App\Http\Resources\CategoriesResource;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    private $rules = [
        'user_id' => 'required|integer',
        'cart_id' => 'required|integer',
        'total_price' => 'required|numeric',
        'cep' => 'required|string|between:8,8',
        'address' => 'required|string',
        'address_number' => 'required|integer',
        'address_city' => 'required|string',
        'address_uf' => 'required|string',
        'address_complement' => 'string|nullable',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
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
                ["message" => $validator->failed()]
            );
        }

        // buscar o carrinho
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
                ['cart.id', $request->cart_id],
                ['cart.status', 1]
            ])
            ->get();

        // criando o pedido
        $pedido = DB::table('orders')
                ->insertGetId([
                    'user_id' => $request->user_id,
                    'cart_id' => $request->cart_id,
                    'total_price' => $request->total_price,
                    'cep' => $request->cep,
                    'address' => $request->address,
                    'address_number' => $request->address_number,
                    'address_city' => $request->address_city,
                    'address_complement' => $request->address_complement,
                    'address_uf' => $request->address_uf,
                ]);

        $orderProducts = [];
        for ($i=0; $i < count($produtosCarrinho); $i++) {
            array_push($orderProducts, [
                'order_id' => $pedido,
                'product_id' => $produtosCarrinho[$i]->id
            ]);
        }

        DB::table('order_products')->insert($orderProducts);
        DB::table('cart')
            ->where('id', $request->cart_id)
            ->update(['status' => 0]);

        return response()->json([
            'message' => 'Pedido criado com sucesso',
            'order_id' => $pedido
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
        $pedidosUsuario = DB::table('orders')
            ->where(['user_id' => $id])
            ->orderByDesc('id')
            ->get();

        return response()->json($pedidosUsuario);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
