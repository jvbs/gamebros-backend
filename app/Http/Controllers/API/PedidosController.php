<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
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
/*     public function store(Request $request)
    {
        $user = \auth()->user();
        $carrinho = $user->getCarrinho()->first();
        $produtosPedido =  $carrinho->getProdutosCarrinho()->get();

        if(\sizeof($produtosPedido) == 0){
            return \response()->json(['msg' => 'Não há produtos no carrinho', 'numero_pedido' => 0], 200);
        }

        $pedido = Order::create([
            'id_user' => $user->id,
        ]);

        foreach ($produtosPedido as $pp){
            $prod = Produto::findOrFail($pp->id_produto);

            ProductOrder::create([
                'id_pedido' => $pedido->id,
                'order_id' => $pp->id_produto,
                'product_id' => $pp->qtd_produto,
                'price' => $prod->vl_produto
            ]);

            TbProdutoCarrinho::where([['id_produto', $pp->id_produto], ['id_carrinho', $carrinho->id]])->delete();
        }

        return \response()->json(['msg' => 'Pedido gerado com sucesso', 'numero_pedido' => $pedido->id], 200);
    } */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
