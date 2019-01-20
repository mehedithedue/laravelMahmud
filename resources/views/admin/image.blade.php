@extends('layouts.app')
@section('style')

    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/basic.min.css') }}">
    <style>
        .dropzone{-webkit-border-radius:0;-moz-border-radius:0;border-radius:0}
        .dropzone-file-area{border:2px dashed #028AF4;background:#fff;padding:20px;margin:0 auto;text-align:center}
        .dz-hidden-input{left:0}
        @media (max-width:768px){.dropzone-file-area{width:auto}}
    </style>
    @endsection
@section('content')
    <section class="content-header">
        <h1>
           Upload Image
            <small>Portfolio</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="tabbable tabbable-tabdrop">
                        <div class="box-header with-border">

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">Interior</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">Exterior</a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">3d Plan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content box-body">
                            <div class="tab-pane active" id="tab1">
                                <form action="{{asset('admin-section/files/store/interior')}}" class="dropzone dropzone-file-area" id="my-dropzone" >
                                        {{ csrf_field() }}
                                </form>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <form action="{{asset('admin-section/files/store/exterior')}}" class="dropzone dropzone-file-area" id="my-dropzone" >
                                        {{ csrf_field() }}
                                </form>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <form action="{{asset('admin-section/files/store/3dplan')}}" class="dropzone dropzone-file-area" id="my-dropzone" >
                                        {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer-script')
<script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>

jQuery(document).ready(function() {
    FormDropzone.init()
});


var FormDropzone = function() {
    return {
        init: function() {
            Dropzone.options.myDropzone = {
                dictDefaultMessage: "",
                init: function() {
                    this.on('error', function(file, response) {
                        $(file.previewElement).find('.dz-error-message').text(response);
                    }),
                    this.on("addedfile", function(e) {
                        var n = Dropzone.createElement("<a href='javascript:;'' class='btn btn-danger btn-sm btn-block'>Remove</a>"),
                            t = this;
                        n.addEventListener("click", function(n) {
                            n.preventDefault(), n.stopPropagation(), t.removeFile(e)
                        }), e.previewElement.appendChild(n)
                    })
                }
            }
        }
    }
}();
@endsection