<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="text-center">
                <h1><span id="typed"></span></h1>
            </div>
        </div>


        <div id="home_content" style="display: none;">
            <p>Hi, I am Mahmud .</p>
            <p>Skilled in 3D architectural rendering</p>
            <p>Also Architectural Animation</p>
            <p>And Architectural Visualization</p>
            <p>Please Explore the site !</p>

        </div>

        <div class="row">
            <div class="next-container">
                <a href="#" class="next-step-arrow">
                    <div class="circle">
                    </div>
                    <div class="arrow over">
                    </div>
                    <div class="arrow out">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        Typed.new("#typed", {
            stringsElement: document.getElementById('home_content'),
            typeSpeed: 100,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to null for infinite loop
            loopCount: null
        });

    });

</script>