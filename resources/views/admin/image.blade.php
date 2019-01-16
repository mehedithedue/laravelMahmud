@extends('layouts.app')
@section('style')

    <link rel="stylesheet" href="{{ asset('assets/css/basic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.min.css') }}">
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
    @endsection
@section('content')
    <section class="content-header">
        <h1>
            General form Elements
            <small>Preview</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Horizontal form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Horizontal form</h3>
                    </div>

                    <form action="{{asset('admin-section/files/store/interior')}}" class="dropzone">
                        {{ csrf_field() }}

                    </form>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection