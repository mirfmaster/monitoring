@extends('adminlte::page')
@section('content')
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="ml-auto mr-auto">
        <form action="{{route('updatevalue', $product->idproduct)}}" method="post" >
            @csrf
            @method('PATCH')
            <input type="hidden" name="idproduct" value="{{ $product->idproduct }}" readonly>
            <div class="form-group">
                <label>Name Product:</label>
                <input type="text" class="form-control" name="nameproduct" value="{{ $product->nameproduct }}" readonly>
            </div>
            <div class="form-group">
                <label>Name Supplier:</label>
                <input type="text" class="form-control" name="namesupplier" value="{{ $product->namesupplier }}" readonly>
            </div>
            <div class="form-group">
                <label>Ukuran:</label>
                <input type="text" class="form-control" name="ukuran" value="{{ $product->ukuran }}" readonly>
            </div>
            <div class="form-group">
                <label>Quantity:</label>
                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" readonly>
            </div>
            <div class="form-group">
                <label>Keterangan:</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $product->keterangan }}" readonly>
            </div>
            <hr >
            <div class="form-group">
                <label>Out Items:</label>
                <input type="number" class="form-control" name="out" placeholder="Cant more than the quantity...">
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Cancel</button>
            </center>
        </form>
    </div>
    </div><!-- /.card-body -->
</div>
@endsection