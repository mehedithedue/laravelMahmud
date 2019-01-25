@extends('layouts.app')

@section('content')
   <section class="content">
    @include('layouts.alert')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header box-header-success box-header-icon">
                        <h4 class="box-title">  Content
                            <small class="category">Details of  Content </small>
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <a href="{{ url('admin-section/content') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('admin-section/content/' . $content->id . '/edit') }}" title="Edit Content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('admin-section/content' . '/' . $content->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-striped table-no-bordered">
                                    <tbody>
                                        <tr>
                                            <th>ID</th><td>{{ $content->id }}</td>
                                        </tr>
                                        <tr><th> Type </th><td> {{ $content->type }} </td></tr><tr><th> Ref Id </th><td> {{ $content->ref_id }} </td></tr><tr><th> Key </th><td> {{ $content->key }} </td></tr><tr><th> Data </th><td> {{ $content->data }} </td></tr><tr><th> Status </th><td> {{ $content->status }} </td></tr>
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
