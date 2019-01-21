@extends('layouts.app')

@section('content')
   <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header">
                        <h3>
                            Edit Image
                           <div class="btn-group  pull-right">
                               <a href="{{route('admin-section/image.create')}}" class="btn btn-info btn-round btn-sm">
                                   Add Image
                               </a>
                               <a href="{{route('admin-section/image.index')}}" class="btn btn-primary btn-round btn-sm">
                                   All Image
                               </a>
                           </div>
                           </h3>
                    </div>
                    <div class="box-body">
                    <div class="col-md-12">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <form method="POST" action="{{ url('admin-section/image/' . $image->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                @include ('admin.image.form', ['formMode' => 'edit'])

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
