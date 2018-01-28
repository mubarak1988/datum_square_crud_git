<!-- index.blade.php -->
@extends('master')
@section('content')
  <div class="container">
      <h1>Products </h1><a href="{{ url('product/create') }}">Create new product</a>
        <hr>
        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        @if(count($products) > 0)
        <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Type</th>
            <th>actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{$product['id']}}</td>
            <td>{{$product['name']}}</td>
            <td title="{{$product['description']}}">{{ str_limit($product['description'], $limit = 30, $end = '...')  }}</td>
            <td>{{$product['stock']}}</td>
            <td>{{$product['price']}}</td>
            <td>{{$product['type']}}</td>
            <td>
                {!! Form::open(['url' => '/product/'.$product['id'], 'method' => 'delete']) !!}
                <a class="btn btn-small btn-success" href="{{ URL::to('product/' . $product['id']) }}">Show</a> |
                <a  class="btn btn-small btn-success" href="{{ URL::to('product/' . $product['id'] . '/edit') }}">Edit</a> |
                {!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        @else
        <p>No product added yet. <a href=" {{ URL::to('product/create') }}">Start Adding</a></p>
        @endif
        
  </div>
@endsection