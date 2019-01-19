@extends('adminlte::page')
@section('title','Reports')
@section('content')
<div class="container">
<form action="{{action('ReportsController@index')}}">
  <div class="input-group mb-2 ml-auto" style="width:32%">
    <div class="input-group-prepend">
      <label class="input-group-text">Filter By Date</label>
    </div>
    <input type="date" name="date" class="form-control mr-2" required>
  <button type="submit" id="src" class="btn btn-primary">Search</button>
  </div>
</form>
<table class="table ml-auto mr-auto" border=1>
  <thead class="thead-dark text-center">
    <tr>
      <th class="align-middle" scope="col" rowspan=2>ID</th>
      <th class="align-middle" scope="col" rowspan=2>Date</th>
      <th class="align-middle" scope="col" rowspan=2>Product Name</th>
      <th class="align-middle" scope="col" rowspan=2>Supplier Name</th>
      <th class="align-middle" scope="col" rowspan=2>Ukuran</th>
      <th class="align-middle" scope="col" colspan=2>Quantity</th>
      <th class="align-middle" scope="col" rowspan=2>Keterangan</th>
    </tr>
    <tr>
      <th scope="col">Good</th>
      <th scope="col">Reject</th>
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
      <td class="text-center align-middle">{{$product['quantity']-$product['out']}}</td>
      <td class="text-center align-middle">{{$product['out']}}</td>
      <td class="text-center align-middle">{{$product['keterangan']}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@php (!isset($products->date) ? $products->date=null:$products->date)
<form action="{{route('pdfrequest')}}" method="POST">
  <input type="hidden" name="date" value="{{$products->date}}">
  @csrf
  <center><button type="submit" class="btn btn-primary">Print Reports </button></center>
</form>
@endsection