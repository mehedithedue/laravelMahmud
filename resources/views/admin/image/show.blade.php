@extends('layouts.app')

@section('content')
   <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header box-header-success box-header-icon">
                        <h4 class="box-title">  Image
                            <small class="category">Details of  Image </small>
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <a href="{{ url('admin-section/image') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('admin-section/image/' . $image->id . '/edit') }}" title="Edit Image"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('admin-section/image' . '/' . $image->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Image" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered">
                                    <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $image->id }}</td>
                                        </tr>
                                        <tr><th> Type </th><td> {{ $image->type }} </td></tr><tr><th> Category Id </th><td> {{ $image->category_id }} </td></tr><tr><th> Ref Id </th><td> {{ $image->ref_id }} </td></tr><tr><th> File Path </th><td> {{ $image->file_path }} </td></tr><tr><th> Status </th><td> {{ $image->status }} </td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
