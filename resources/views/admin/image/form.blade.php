<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($image->type) ? $image->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category Id' }}</label>
    <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($image->category_id) ? $image->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ref_id') ? 'has-error' : ''}}">
    <label for="ref_id" class="control-label">{{ 'Ref Id' }}</label>
    <input class="form-control" name="ref_id" type="number" id="ref_id" value="{{ isset($image->ref_id) ? $image->ref_id : ''}}" >
    {!! $errors->first('ref_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('file_path') ? 'has-error' : ''}}">
    <label for="file_path" class="control-label">{{ 'File Path' }}</label>
    <input class="form-control" name="file_path" type="text" id="file_path" value="{{ isset($image->file_path) ? $image->file_path : ''}}" >
    {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($image->status) ? $image->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group ">
            <input class="btn text-bold btn-success btn-block" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        </div>
    </div>
</div>