@extends('layout.template')
@section('title', 'Editar Produto')
@section('content')


<div class="container mt-4">
<form method="POST" action="{{ route('produtos.editar', $produto) }}">
    @csrf
    @method('put');
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label >Nome</label>
            <input type="text" class="form-control" name="nome" value="{{$produto->nome}}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label >Estoque</label>
            <input type="text" class="form-control" name="estoque">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label >Valor</label>
            <input type="text" class="form-control" name="valor" value="{{$produto->valor}}">
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label >Descrição</label>
            <textarea class="form-control" name="descricao" rows="3"> {{ $produto->descricao }} </textarea>
        </div>
    </div> 
</div>
  <button type="submitt" class="btn btn-outline-primary">Enviar</button>
</form>
</div>

@endsection