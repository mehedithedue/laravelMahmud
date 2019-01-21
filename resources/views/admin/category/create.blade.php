@extends('layouts.app')

@section('content')
   <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-warning">
                <div class="box-header">
                    <h3>
                        Create New Category
                        <div class="pull-right">
                            <a href="" class="btn btn-primary btn-round btn-sm">
                                All %%crudNameCap%%
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

                            <form method="POST" action="{{ url('admin-section/category') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include ('admin.category.form', ['formMode' => 'create'])

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
