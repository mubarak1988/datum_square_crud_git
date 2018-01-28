<!-- create.blade.php -->

@extends('master')
@section('content')
<div class="container">
   {{ Form::open(array('url' => 'product')) }}
      {{csrf_field()}}
      <h1>Create Product</h1> <a href="{{ url('product') }}">Products</a>
      <hr>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="name" placeholder="Name" name="name" value="{{old('name')}}">
        @if ($errors->has('name'))
            {!! $errors->first('name', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
      <div class="col-sm-10">
          <textarea class="form-control" rows="5" id="description" name="description" placeholder="Description" value="{{old('description')}}">{{ old('description') }}</textarea>
          @if ($errors->has('description'))
            {!! $errors->first('description', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="stock" class="col-sm-2 col-form-label col-form-label-lg">Stock</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="stock" placeholder="Stock" name="stock"  value="{{old('stock')}}">
        @if ($errors->has('stock'))
            {!! $errors->first('stock', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="price" class="col-sm-2 col-form-label col-form-label-lg">Price</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="price" placeholder="Price" name="price"  value="{{old('price')}}">
        @if ($errors->has('name'))
            {!! $errors->first('name', '<small class=error>:message</small>') !!}
        @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="type" class="col-sm-2 col-form-label col-form-label-lg">Type</label>
      <div class="col-sm-10">
        <select class="form-control" id="type" name="type">
            <option value="" {{ old("type") == "" ? "selected" : "" }}>Select type</option>
            <option value="men" {{ old("type") == "men" ? "selected" : "" }}>Men</option>
            <option value="women" {{ old("type") == "women" ? "selected" : "" }}>Women</option>
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