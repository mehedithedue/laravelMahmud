@extends('layouts.app')

@section('content')
<section class="content-header">
        <h1>
           Create New Menu
        </h1>
    </section>
   <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header"><h4>Create New aaa</h4></div>
                    <div class="box-body">
                        <div class="col-md-11">
                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/menu') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.menu.form', ['formMode' => 'create'])

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
