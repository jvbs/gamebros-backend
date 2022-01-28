@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col-md-4 col-12" style="">
            <h1 style="color: #170085">Editar Produto</h1>
        </div>
        <div class="col-md-8 col-12" style="background-color: #170085; border-radius: 30px; height: 45%; margin-top: 1%">
            .
        </div>
    </div>

    <div class="form-check form-switch mt-4">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked />
        <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
    </div>

    <form method="POST" action="{{route('produtos.update', $product->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="row">
                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="nome">Nome*</label>
                        <input type="text" name="name" class="form-control" id="InputNome" placeholder="" value="{{$product->name}}">
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="sku">SKU*</label>
                        <input type="text" name="sku" class="form-control" id="InputSKU" placeholder="" value="{{$product->sku}}">
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="form-group">
                        <label for="descricao">Descricao*</label>
                        <textarea class="form-control" name="description" id="InputDescricao">{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="categoria">Categoria*</label>
                        <!-- <input type="text" name="category" class="form-control" id="InputNome" placeholder=""> -->
                        <select name="category_id" class="form-control" id="category_id" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="sub-categoria">Sub-Categoria*</label>
                        <select name="subCategory" class="form-control" required>
                            <option value="{{$product->subCategory}}" disabled selected>Selecione</option>
                            <option>Acessórios</option>
                            <option>Console</option>
                            <option>Jogos</option>
                        </select>
                    </div>
                </div>

                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="preco">Preco*</label>
                        <input type="number" name="price" class="form-control" id="InputPreco" placeholder="" value="{{$product->price}}">
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="desconto">Desconto*</label>
                        <input type="number" name="discount" class="form-control" id="InputDesconto" placeholder="" value="{{$product->discount}}">
                    </div>
                </div>

                <div class="col-6 mt-4">
                    <div class="form-group">
                        <label for="estoque">Estoque*</label>
                        <input type="number" name="stock" class="form-control" id="InputEstoque" placeholder="" value="{{$product->stock}}">
                    </div>
                </div>
                <div class="col-6 mt-4">

                </div>


            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="userPhotoWrapperProduct">
                <img class="userFoto" src="{{ asset($product->image) }}" alt="userPhoto" />
            </div>
            <label class="form-label content-center" for="customFile">Adicionar imagem do
                produto</label>
            <input type="file" name="image" id="image" class="form-control BtnCancelar" accept=".png,.jpeg,.jpg" id="customFile" />
        </div>

    </div>
    <div class="row mt-4 mb-4">
        <div class="col-lg-6 col-12"></div>
        <div class="col-lg-3 col-6">
            <div class="boxBtnForm">
                <a href="{{ route('produtos.index') }}" type="button" class="col-12 BtnCancelar mt-3">Cancelar</a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="boxBtnForm">
                <button type="submit" class="col-12 BtnSalvar btnOpacity mt-3">Salvar</div>
            </div>
        </div>
    </div>
    </form>
@endsection
