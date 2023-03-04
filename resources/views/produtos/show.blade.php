@extends('layout.template')
@section('title', 'Produto')
@section('content')
<?php
$valor_produto = number_format($produto->valor, 2, ',', '.');
?>
<div class="jumbotron">
  <h1 class="display-4">{{$produto->nome}} </h1>
  <p class="lead">{{$produto->descricao}} - Valor R$: <?php echo $valor_produto; ?> </p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="{{ route ('produtos')}} " role="button">Ver Produtos</a>
</div>
@endsection