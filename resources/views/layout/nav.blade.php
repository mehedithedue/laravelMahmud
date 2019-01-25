<nav class="navbar menu-item navbar-fixed-top before">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="navbar-header scroll-to">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="#" style="padding: 0px !important;">
                        @if(!empty(\App\Models\ImageModel::getLogo()))
                            <img src="{{url(\App\Models\ImageModel::getLogo())}}" alt="Logo" >
                        @else
                        <span>Mahmud</span>
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right scroll-to">
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#quote">Quote</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>