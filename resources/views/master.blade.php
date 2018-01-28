<!-- master.blade.php -->

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product Operations</title>

        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <style>
            
            .error {
                color: red;
            }
            
        </style>
    </head>
    <body>
        <br><br>
         
        <div class="container">
            <div class="row" style="text-align: center;">
                <a href="{{ URL::to('product') }}">Products</a> | <a href="{{ URL::to('git') }}">Git</a>
            </div>
        </div>
        
        @yield('content')
    </body>
</html>