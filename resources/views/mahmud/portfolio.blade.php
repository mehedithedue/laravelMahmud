<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Portfolio</h1>
        </div>
    </div>

    <div class="section st no-padding">
        <div class="row">
            <div class="col-md-12">
                <section>
                    <div class="row">
                        <ul class="gallety-filters controls col-md-12 col-xs-12" style="margin-bottom: 20px;">
                            <li><a type="button" class="control" data-filter="all">All</a></li>
                            @foreach(\App\Models\Category::imageCategory() as $category)
                                <li><a type="button" class="control" data-filter=".{{$category->category}}">{{$category->name}}</a></li>
                            @endforeach
                            <li class="gf-underline"></li>
                        </ul>
                    </div>


                    <div class="mixitup_container">
                        <div id="mixitup_container_elements" class="row"></div>
                        <div class="gap"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-xs-12">
                            <div class="load-more-block">
                                <button href="#" class="loadmore btn-block" data-link="#" data-offset="5"
                                        data-items-per-page="5">Load More
                                </button>
                                <span class="loading-spinner" style="display:none;"></span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>