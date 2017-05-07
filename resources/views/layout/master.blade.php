<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge'">
        <title>Mahmud's</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        @include ('layout.link ')

        <style>
            .x{height:500px; padding-top:50px;}
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="home-section with-background" style="z-index: 1;">
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
            
            <div id="about">
                
                @yield ( 'about' )
                
            </div>
<<<<<<< HEAD
            <div id="service">

=======
		</div>
		<div class="container-fluid">
            <div id="service">
				<div class="container">
>>>>>>> 202101038176a42cae9ffb367d6ec1b18703d4a9
                @yield ( 'service' )
				</div>
            </div>
<<<<<<< HEAD
=======
		</div>
		<div class="container">
>>>>>>> 202101038176a42cae9ffb367d6ec1b18703d4a9
            <div id="portfolio">

                @yield ( 'portfolio' )

            </div>
            <div id="contact">

                @yield ( 'contact' )

            </div>
            
        </div>

        @include ( 'layout.js_link' )
    </body>
</html>
