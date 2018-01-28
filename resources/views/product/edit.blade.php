<!-- create.blade.php -->

@extends('master')
@section('content')
<div class="container">
     {{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'PUT')) }}
      {{csrf_field()}}

      <h1>Update Product ({{ $product['name'] }})</h1> <a href="{{ url('product') }}">Products</a>
      <hr>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="name" placeholder="Name" name="name" value="{{ old('name') ? old('name') : $product->name }}">
        @if ($errors->has('name'))
            {!! $errors->first('name', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
      <div class="col-sm-10">
          <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description" value="{{ old('description') ? old('description') : $product->description  }}">{{  old('description') ? old('description') : $product->description  }}</textarea>
          @if ($errors->has('description'))
            {!! $errors->first('description', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="stock" class="col-sm-2 col-form-label col-form-label-lg">Stock</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="stock" placeholder="Stock" name="stock"  value="{{ old('stock') ? old('stock') : $product->stock  }}">
        @if ($errors->has('stock'))
            {!! $errors->first('stock', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="price" class="col-sm-2 col-form-label col-form-label-lg">Price</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="price" placeholder="Price" name="price"  value="{{  old('price') ? old('price') : $product->price  }}">
        @if ($errors->has('price'))
            {!! $errors->first('price', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="type" class="col-sm-2 col-form-label col-form-label-lg">Type</label>
      <div class="col-sm-10">
        <select class="form-control" id="type" name="type">
            <option value="" {{ (old('type') ? old('type') : $product->type) == "" ? "selected" : "" }}>Select type</option>
            <option value="men" {{ (old('type') ? old('type') : $product->type) == "men" ? "selected" : "" }}>Men</option>
            <option value="women" {{ (old('type') ? old('type') : $product->type) == "women" ? "selected" : "" }}>Women</option>
        </select>
          @if ($errors->has('type'))
            {!! $errors->first('type', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>  
        

      <div class="form-group row" style="text-align: center;">
      <input type="submit" class="btn btn-primary">
    </div>
  {{ Form::close() }}
  
  
</div>
@endsection