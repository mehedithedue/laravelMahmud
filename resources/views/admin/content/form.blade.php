<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($content->type) ? $content->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ref_id') ? 'has-error' : ''}}">
    <label for="ref_id" class="control-label">{{ 'Ref Id' }}</label>
    <input class="form-control" name="ref_id" type="number" id="ref_id" value="{{ isset($content->ref_id) ? $content->ref_id : ''}}" >
    {!! $errors->first('ref_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    <label for="key" class="control-label">{{ 'Key' }}</label>
    <input class="form-control" name="key" type="text" id="key" value="{{ isset($content->key) ? $content->key : ''}}" >
    {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('data') ? 'has-error' : ''}}">
    <label for="data" class="control-label">{{ 'Data' }}</label>
    <textarea class="form-control" rows="5" name="data" type="textarea" id="data" >{{ isset($content->data) ? $content->data : ''}}</textarea>
    {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($content->status) ? $content->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group ">
            <input class="btn text-bold btn-success btn-block" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        </div>
    </div>
</div>