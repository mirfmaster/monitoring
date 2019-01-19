@extends('adminlte::page')
@section('content')

<form action="{{route('product.store')}}" method="POST" style="width:50%;margin-left:25%">
  <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control" name="nameproduct" required>
  </div>
  <div class="form-group">
    <label>Supplier Name</label>
    <input type="text" class="form-control" name="namesupplier" required>
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" class="form-control" name="quantity" required>
  </div>
  <div class="form-group">
    <label>Ukuran</label>
    <input type="text" class="form-control" name="ukuran" required>
  </div>
  <div class="form-group">
    <label>Keterangan</label>
    <input type="text" class="form-control" name="keterangan" required>
  </div>
  @csrf
  <center>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-info">Reset</button>
    </center>
</form>

</div>

@endsection