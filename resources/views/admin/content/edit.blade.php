@extends('layouts.app')

@section('content')
   <section class="content">
    @include('layouts.alert')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header">
                        <h3>
                            Edit Content
                           <div class="btn-group  pull-right">
                               <a href="{{route('content.create')}}" class="btn btn-info btn-round btn-sm">
                                   Add Content
                               </a>
                               <a href="{{route('content.index')}}" class="btn btn-primary btn-round btn-sm">
                                   All Content
                               </a>
                           </div>
                           </h3>
                    </div>
                    <div class="box-body">
                    <div class="col-md-12">

                            <form method="POST" action="{{ url('admin-section/content/' . $content->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}

                                @include ('admin.content.form', ['formMode' => 'edit'])

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
