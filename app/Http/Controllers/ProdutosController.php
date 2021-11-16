<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductsResource;

class ProdutosController extends Controller
{

    private $rules = [
        'name' => 'required|between:5,50',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'description' => 'required',
        'price' => 'required|numeric',
        'discount' => 'required|between:1,100',
        'stock' => 'required|integer|between:1,9999',
        'sku' => 'required',
        'category_id' => 'required|integer',
        'subCategory' => 'required'
    ];

    private $product;

    public function __construct(Product $product){
        $this->product = $product;

    }

    public function index(Request $request)
    {
        $products = Product::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->paginate(10);

        return view('produtos.index', compact('products'))->with('categories', Category::orderBy('name')->get());
    }

    public function create()
    {
        //return view('produtos.create');
        return view('produtos.create')->with('categories', Category::orderBy('name')->get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $data = $request->all();

        $product = Product::create($data);
        //$product->category()->sync($data['categories']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('/public/produtos');
            $path = str_replace('public/', 'storage/', $path);

            Product::where('id', $product->id)->update([
                'image' => $path,
            ]);
        }

        session()->flash('success', 'Produto foi cadastrado com sucesso');
        return redirect(route('produtos.index'))->with('success', 'Produto criado com sucesso.');
    }

    public function edit($product)
    {
        $product = $this->product->findOrFail($product);
        return view('produtos.edit', compact('product'))->with('categories', Category::orderBy('name')->get());
    }

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
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->stock = $request->stock;
            $product->sku = $request->sku;
            $product->category_id = $request->category_id;
            $product->subCategory = $request->subCategory;

            $product->save();

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('/public/produtos');
                $path = str_replace('public/', 'storage/', $path);
    
                $product->update([
                    'image' => $path,
                ]);
            }

            return redirect(route('produtos.index'))->with('success', 'Produto atualizado com sucesso.');
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product){
            $product->delete();
        }
        
        return redirect(route('produtos.index'))->with('success', 'Produto excluído com sucesso.');
    }
}
