<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Custom</title>
        <!-- Bootstrap -->
        <link href="{{URL::asset('css/bootstrap.css')}}" rel="stylesheet">
        <style>
            .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @yield('sidebar')
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{URL::asset('js/bootstrap.js') }}"></script>
    </body>
</html>