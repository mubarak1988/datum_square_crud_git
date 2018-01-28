<!-- index.blade.php -->
@extends('master')
@section('content')
 @if(! empty($arr))
    <br><br>
    @foreach($arr as $key=>$avatar)
    
    <div class="row">
 <div class="col-md-2 col-md-offset-5">
   <img  alt="avatars" class="img-responsive" height="150" width="150" src="{{$avatar}}" />
 </div>
</div>
    <br><br>
    @endforeach
    <div class="row">
 <div class="col-md-2 col-md-offset-5">
   20 max Avatars for this version !
 </div>
</div>
   

@endif
<div class="container">
    {{ Form::open(array('url' => 'git')) }}
    {{csrf_field()}}
    <h1>GitHub Followers</h1> 
    <hr>
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label col-form-label-lg">GitHub Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="username" placeholder="GitHub username" name="username" value="{{old('username')}}">
            @if ($errors->has('username'))
            {!! $errors->first('username', '<small class=error>:message</small>') !!}
            @endif
        </div>
    </div>



    <div class="form-group row" style="text-align: center;">
        <input type="submit" class="btn btn-primary">
    </div>
    {{ Form::close() }}
</div>
@endsection