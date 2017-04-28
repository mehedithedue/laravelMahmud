<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge'">
        <title>Mahmud's</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include ('layout.link ')

        <style>
            .x{height:500px; padding-top:25px;}
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="home-section with-background">
            <div class="header-section">
                
                @include ( 'layout.nav' )
                
            </div>
            <div id="home" class="home">
                <div class="home-area">
                    
                    @yield ( 'home' )
                    
                </div>
            </div>
        </div>

        <div class="container">
            
            <div id="about" class="row x">
                
                @yield ( 'about' )
                
            </div>
            <div id="service" class="row x">

                @yield ( 'service' )

            </div>
            <div id="portfolio" class="row x">

                @yield ( 'portfolio' )

            </div>
            <div id="contact" class="row x">

                @yield ( 'contact' )

            </div>
            
        </div>

        @include ( 'layout.js_link' )
    </body>
</html>
