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
    @include ('layout.link ')
    <script>
        var fullPath = "{{url('/')}}/";
    </script>
    <style>
        .x {
            height: 500px;
            padding-top: 50px;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<section>
    <div class="home-section">
        <div class="header-section">

            @include ( 'layout.nav' )

        </div>
        <div id="home" class="home with-background">
            <div class="home-area">

                @include ( 'mahmud.home')

            </div>
        </div>
    </div>
</section>

<div class="container">

    <div id="about" class="about_area">

        @include ( 'mahmud.about')

    </div>
</div>
<div class="container-fluid">
    <div id="service" class="service_area">
        <div class="container">
            @include ( 'mahmud.service')
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="portfolio" class="portfolio_area">

        @include ( 'mahmud.portfolio')

    </div>
</div>
<div class="container-fluid">
    <div id="quote" class="quote_area">

        @include ( 'mahmud.quote')

    </div>
</div>
<div class="container-fluid">
    <div id="contact" class="contact_area">

        @include ( 'mahmud.contact')
        @include ( 'mahmud.footer')

    </div>
</div>

@include ( 'layout.js_link' )
</body>
</html>
