<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Validator;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    private $rules = [
        'name' => 'required|between:5,50',
    ];

    private $categoria;

    public function __construct(Category $categoria)
    {
        $this->categoria = $categoria;
    }
    
    public function index(Request $request)
    {
        $categorias = Category::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->paginate(10);

        return view('categorias.index', compact('categorias'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if($validator->fails()){
            //return response()->json($validator->errors());
            return redirect("categories/create")->withErrors($validator->errors());
        }

        Category::create($request->all());
        return redirect(route('categorias.index'))->with('success', 'Categoria criada');
    }

    public function edit($categoria)
    {
        $categoria = $this->categoria->findOrFail($categoria);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $categoria)
    {
        $data = $request->all();
        $categoria = $this->categoria->find($categoria);
        $categoria->update($data);
        return redirect(route('categorias.index'))->with('success', 'Categoria atualizada');
    }

    public function destroy($categoria)
    {
        $categoria = $this->categoria->find($categoria);
        $categoria->delete();
        return redirect(route('categorias.index'))->with('success', 'Categoria deletada');
    }
}
