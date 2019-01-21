@foreach($portfolioImages as $portfolioImage)
    <div class="mix {{$portfolioImage->category}} col-md-3">
        <a href="{{$portfolioImage->file_path}}"
           data-lightbox="{{$portfolioImage->category}}" data-title="{{$portfolioImage->name}}">
            <img class="img-responsive"
                 src="{{$portfolioImage->thumb_file_path}}" alt="">
        </a>
    </div>
@endforeach