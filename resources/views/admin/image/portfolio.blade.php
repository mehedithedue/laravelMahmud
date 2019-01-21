@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone/basic.min.css') }}">
    <style>
        .dropzone {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0
        }

        .dropzone-file-area {
            border: 2px dashed #028AF4;
            background: #fff;
            padding: 20px;
            margin: 0 auto;
            text-align: center
        }

        .dz-hidden-input {
            left: 0
        }

        @media (max-width: 768px) {
            .dropzone-file-area {
                width: auto
            }
        }
    </style>
@endsection
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="tabbable tabbable-tabdrop">
                        <div class="box-header with-border">

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#all_{{$category->category}}_image" data-toggle="tab">All {{ $category->name }}
                                        Image</a>
                                </li>
                                <li>
                                    <a href="#add_{{$category->category}}_image" data-toggle="tab">Add New {{ $category->name }}
                                        Image</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content box-body">
                            <div class="tab-pane active" id="all_{{$category->category}}_image">
                                <div class="box-body">

                                    <div class="table-responsive">

                                        <table id="datatables-image" class="table table-striped table-no-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Order</th>
                                                <th>Image</th>
                                                <th class="disabled-sorting text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div><!-- end content-->
                            </div>
                            <div class="tab-pane" id="add_{{$category->category}}_image">
                                <p class="text-center">Please drop image or click below box to upload images</p>
                                <hr>
                                <form action="{{asset('admin-section/files/store/'.$category->id.'/'.$category->category)}}"
                                      class="dropzone dropzone-file-area" id="my-dropzone">
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

    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript">

        var baseUrl = "{{url('/')}}";

        $(document).ready(function () {

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

            var table = $('#datatables-image').DataTable({
                "pagingType": "full_numbers",

                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                    processing: "Loading .....",
                },
                "ajax": "{{url('admin-section/portfolio-image-json/'.$category->id.'/'.$category->category)}}",
                "columns": [
                    {"data": "name"},
                    {"data": "type"},
                    {"data": "order"},
                    {
                        "data": "thumb_file_path",
                        render : function (data, type, row, meta) {
                            return '<img class="img-responsive" src="'+baseUrl + data +'"/>';
                        }
                    },
                    {
                        "data": "id",
                        render: function (data, type, row, meta) {
                            return '<a href="{{url("admin-section/image")}}/' + data + '/edit" class="btn btn-sm btn-primary btn-just-icon edit">Edit</a>' +
                                '' +
                                '<form action="{{url("admin-section/image")}}/' + data + '" method="post" style=" display: inline;">' +
                                '<input type="hidden" name="_method" value="delete">' +
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                '<button class="btn btn-sm btn-danger btn-just-icon remove">Delete</button>' +
                                '</form>';
                        }

                    }
                ]

            });

            // Delete a record
            table.on('click', '.remove', function (e) {

                e.preventDefault();

                if (confirm("Ara you sure delete Image ? ")) {

                    $tr = $(this).closest('tr');
                    table.row($tr).remove().draw();


                    $formField = $(this).closest('form');

                    $url = $(this).closest('form').attr('action');

                    $formData = $formField.serialize();

                    $.post($url, $formData, function (response) {
                        swal("Delete Successful!", response, "success");
                    });
                }
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var target = $(e.target).attr("href");
                if(target == '#all_{{$category->category}}_image'){
                    table.ajax.reload();
                }
            });

            $('.box .table-responsive label').addClass('form-group');
        });

    </script>
@endsection