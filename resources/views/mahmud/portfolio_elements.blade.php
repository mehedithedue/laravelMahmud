@for ( $i = $limit; $i <= $offset; $i++)
    @php
        $category = '';

            switch ($i) {
            case $i%5==0:
                $category = 'exterior';
                break;
            case $i%3==0:
                $category = 'interior';
                break;
            case $i%4==0:
                $category = 'plan3D';
                break;
            case $i%2==0:
                $category = 'plan2D';
                break;
            default:
                $category = 'no-cat';
                break;
        }
    @endphp
    <div class="mix {{$category}} col-md-3">
        <a href="http://mental-wp.azelab.com/html/images/gallery/thumbs700/{{sprintf("%02d", $i)}}.jpg"
           data-lightbox="{{$category}}" data-title="My caption">
            <img class="img-responsive"
                 src="http://mental-wp.azelab.com/html/images/gallery/thumbs700/{{sprintf("%02d", $i)}}.jpg" alt="">
        </a>
    </div>
@endfor