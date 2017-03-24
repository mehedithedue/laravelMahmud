    @extends('layout')

    @section('sidebar')
        
    @endsection

    @section('content')
        <div class="flex-center">
            <ul>
                @foreach($tasks as $task)
                    <li>{{$task->body}} -- {{$task->complete}}</li>
                @endforeach

            </ul>
        </div>
    @endsection