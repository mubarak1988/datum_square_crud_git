<!-- index.blade.php -->
@extends('master')
@section('content')
  <div class="container">
      <h1>Products </h1><a href="{{ url('product/create') }}">Create new product</a> | <a href="{{ url('product') }}">Products</a>
        <hr>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table table-striped">
        
        <div class="jumbotron">
            <h2>{{ $product->name }}</h2>
            <p>
                <strong>Description:</strong> {{ $product->description }}<br>
                <strong>Stock:</strong> {{ $product->stock }}<br>
                <strong>Price:</strong> {{ $product->price }}<br>
                <strong>Type:</strong> {{ $product->type }}<br>
            </p>
           
            
            {!! Form::open(['url' => '/product/'.$product->id, 'method' => 'delete']) !!}
                 <a  class="btn btn-small btn-success" href="{{ URL::to('product/' . $product->id . '/edit') }}">Update</a>  |
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
                
        </div>
            
  </div>
@endsection