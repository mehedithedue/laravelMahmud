<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="number" id="status" value="{{ isset($category->status) ? $category->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('serial') ? 'has-error' : ''}}">
    <label for="serial" class="control-label">{{ 'Serial' }}</label>
    <input class="form-control" name="serial" type="number" id="serial" value="{{ isset($category->serial) ? $category->serial : ''}}" >
    {!! $errors->first('serial', '<p class="help-block">:message</p>') !!}
</div>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group ">
            <input class="btn text-bold btn-success btn-block" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        </div>
    </div>
</div>
