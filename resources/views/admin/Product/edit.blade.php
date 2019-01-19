@extends('adminlte::page')
@section('content')
    @foreach($product as $prod)
    <div class="container" style="padding-left:25%;padding-right:25%;">
        <div class="ml-auto mr-auto">
        <form action="{{ route('product.update', $prod->idproduct) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Name Product:</label>
                <input type="text" class="form-control" name="nameproduct" value="{{ $prod->nameproduct }}">
            </div>
            <div class="form-group">
                <label>Name Supplier:</label>
                <input type="text" class="form-control" name="namesupplier" value="{{ $prod->namesupplier }}">
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" class="form-control" name="quantity" value="{{ $prod->quantity }}">
            </div>
            <div class="form-group">
                <label>Ukuran:</label>
                <input type="text" class="form-control" name="ukuran" value="{{ $prod->ukuran }}">
            </div>
            <div class="form-group">
                <label>Keterangan:</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $prod->keterangan }}">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-warning" type="reset">Cancel</button>
        </form>
    </div>
    @endforeach
@endsection