<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge'">
    <title>Mahmud's</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="icon" type="image/png" href="http://localhost:8000/assets/img/favicon.png">

    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets//css/style.css') }}">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
            href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <style>

        .error-template {padding: 40px 15px;text-align: center; margin-top:40px;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px; }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Your Requested page not found!
                </div>
                <div class="error-actions">
                    <a href="{{url('/')}}"style="border-radius: 0px !important;" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
