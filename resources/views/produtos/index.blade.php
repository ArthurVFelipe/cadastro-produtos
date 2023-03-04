@extends('layout.template')
@section('title', 'Produtos')
@section('content')
<?php 
@session_start();
if(@$_SESSION['id_usuario'] == null){
  echo "<script language='javascript'> window.location='./'</script>";
}
if(!isset($id)){
  $id = "";  
}
?>
<div class="container">
<a href="{{route('produtos.inserir')}}" role="button" class="mt-4 mb-4 btn btn-primary">Inserir Produto</a>
<div class="card shadow mb-4">
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Valor</th>
          <th>Ações</th>
        </tr>
      </thead>
      @foreach($produtos as $produto)       
      <tbody>
        <tr>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->valor}}</td>
            <td>
              <a href="{{route('produtos.descricao', $produto->id)}}"><i class="fa-regular fa-eye text-primary mr-1"></i></a>
              <a href="{{route('produtos.edit', $produto->id)}}"><i class="fa-solid fa-file-pen text-info mr-1"></i></a>
              <a href="{{route('produtos.modal', $produto)}}"><i class="fa-solid fa-trash text-danger mr-1"></i></a>
            </td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>
</div>
</div>

    <!--{{ $produtos->links() }}-->
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esse registro? <?php echo @$id?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
      <form method="POST" action="{{ route('produtos.delete', $id) }}">
        @csrf 
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Excluir</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php
  if(@$id != ""){
    echo "<script>$('#staticBackdrop').modal('show');</script>";
  }
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dataTable').dataTable({
      'ordering':false
    });
  });
</script>
    

@endsection