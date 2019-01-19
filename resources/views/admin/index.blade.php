@extends('adminlte::page')
@section('title','Production')
@section('content')


@if($errors->any())
  <div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $error)
    <strong>Warning!</strong>{{$error}}
    <button type="button" class="close" data-dismiss="alert">
      <span aria-hidden="true">&times;</span>
    </button>
  @endforeach
  </div>
@endif

@if(session('message'))
  <div class="alert alert-primary" role="alert">
    <strong>Congratulations!</strong> {{Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<div class="container">
  <div class="input-group col-sm-4" style="float:right;margin-right:8%;margin-bottom:5px">
    <div class="input-group-prepend">
      <div class="input-group-text">Search</div>
    </div>
    <form action="{{route('product.index')}}">
      <input type="text" class="form-control" placeholder="Keyword and press enter..." name="created_at">
      <input type="hidden" id="src">
    @csrf
    </form>
  </div>


<script>
  function src() {
    if (e.which == 13) {
      document.getElementById("src").click;
    }
    
  }
</script>

<table class="table ml-auto mr-auto">
  <thead class="thead-dark text-center">
    <tr >
      <th scope="col" rowspan=2 class="align-middle">ID</th>
      <th scope="col" rowspan=2 class="align-middle">Date</th>
      <th scope="col" rowspan=2 class="align-middle">Product Name</th>
      <th scope="col" rowspan=2 class="align-middle">Supplier Name</th>
      <th scope="col" rowspan=2 class="align-middle">Ukuran</th>
      <th scope="col" colspan=2>Quantity</th>
      <th scope="col" rowspan=2 class="align-middle">Keterangan</th>
    </tr>
    <tr>
      <th scope="col">In</th>
      <th scope="col">Out</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th class="text-center align-middle">{{$product['idproduct']}}</th>
      <th class="text-center align-middle">{{$product['created_at']}}</th>
      <th class="align-middle">{{$product['nameproduct']}}</th>
      <td class="text-center align-middle">{{$product['namesupplier']}}</td>
      <td class="text-center align-middle">{{$product['ukuran']}}</td>
      <td class="text-center align-middle">{{$product['quantity']}}</td>
      <td class="align-middle" align="center">
          <form action="{{ action('ProductController@showvalue', $product->idproduct) }}" method="post" style="margin-bottom:5px;">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <input name="idproduct" type="hidden" value="{{$product->idproduct}}">
            <button class="btn btn-primary" type="submit">Reject</button>
          </form>
      </td>

      <td class="text-center align-middle">{{$product['keterangan']}}</td>
      <td class="text-center align-middle">
        <a href="{{ action('ProductController@edit', $product->idproduct) }}" class="btn btn-warning" style="margin-bottom:2px">Edit</a>
          <form action="{{ action('ProductController@destroy', $product->idproduct) }}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
    </tr>
    
  @endforeach
  </tbody>
</table>
<div class="ml-auto">
  {{$products->links()}}
</div>
@endsection