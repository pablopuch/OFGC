<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('project_id') }}
            {{ Form::text('project_id', $directorProject->project_id, ['class' => 'form-control' . ($errors->has('project_id') ? ' is-invalid' : ''), 'placeholder' => 'Project Id']) }}
            {!! $errors->first('project_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('director_id') }}
            {{ Form::text('director_id', $directorProject->director_id, ['class' => 'form-control' . ($errors->has('director_id') ? ' is-invalid' : ''), 'placeholder' => 'Director Id']) }}
            {!! $errors->first('director_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>