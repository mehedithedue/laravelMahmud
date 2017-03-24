    @extends('layout')

    @section('sidebar')
        <ul>
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
            <li><a href="#">Five</a></li>
        </ul>
    @endsection

    @section('content')
        <ul>
       @foreach($card as $value)

               <li>{{$value->title}}</li>

        @endforeach
        </ul>

    @endsection