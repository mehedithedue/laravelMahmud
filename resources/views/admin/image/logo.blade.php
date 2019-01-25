@extends('layouts.app')

@section('content')
    <section class="content">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-info">
                    <div class="box-header">
                        <h3>
                            Upload Logo
                        </h3>
                    </div>

                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                @if($image)
                                    <img src="{{asset($image->file_path)}}" class="img-responsive" style="max-height: 200px;" alt="">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ url('admin-section/upload-logo-store') }}"
                                      accept-charset="UTF-8"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Select Your Logo</label>
                                            <input type="file" name="file">

                                            <p class="help-block">Enter your logo here.</p>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Upload Logo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
