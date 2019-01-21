@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
   <section class="content">
   <div class="row">
               <div class="col-md-12">
                   <div class="box">
                       <div class="box-header box-header-success box-header-icon">
                           <h4 class="box-title">List of All Category </h4>
                           <a href="{{route('category.create')}}"
                           class="btn btn-primary btn-round btn-sm pull-right">
                            Add New Category
                           </a>
                       </div>
                       <div class="box-body">

                           <div class="table-responsive">

                               <table id="datatables-category" class="table table-striped table-no-bordered table-hover">
                                   <thead>
                                       <tr>
                                           <th>Name</th><th>Category</th><th>Status</th><th>Serial</th>
                                           <th class="disabled-sorting text-right">Actions</th>
                                       </tr>
                                   </thead>
                                   <tbody></tbody>
                               </table>
                           </div>
                       </div><!-- end content-->
                   </div><!--  end box  -->
               </div> <!-- end col-md-12 -->
           </div> <!-- end row -->
    </section>
@endsection

@section('footer-script')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">


        $(document).ready(function() {

            var table = $('#datatables-category').DataTable({
                "pagingType": "full_numbers",

                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                    processing: "Loading .....",
                },
                "ajax": "{{route('category.index.json')}}",
                "columns": [
                    { "data": "name" },
                    { "data": "category" },
                    { "data": "status" },
                    { "data": "serial" },
                    {
                        "data": "id",
                        render: function (data, type, row, meta) {
                            return '<a href="{{url("admin-section/category")}}/' + data + '/edit" class="btn btn-sm btn-primary btn-just-icon edit">Edit Category</a>' +
                                ''
                                //'<form action="{{url("admin-section/category")}}/' + data + '" method="post" style=" display: inline;">' +
                                //'<input type="hidden" name="_method" value="delete">' +
                                //'<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                //'<button class="btn btn-sm btn-danger btn-just-icon remove">Delete</button>' +
                                //'</form>'
                            ;
                        }

                    }
                ]

            });

            // Delete a record
            table.on('click', '.remove', function(e) {

                e.preventDefault();

                if (confirm("Ara you sure delete Category ? ")) {

                    $tr = $(this).closest('tr');
                    table.row($tr).remove().draw();


                    $formField = $(this).closest('form');

                    $url = $(this).closest('form').attr('action');

                    $formData = $formField.serialize();

                    $.post( $url, $formData, function( response ) {
                        swal("Delete Successful!", response, "success");
                    });
                }


            });

            $('.box .table-responsive label').addClass('form-group');
        });

    </script>
@endsection