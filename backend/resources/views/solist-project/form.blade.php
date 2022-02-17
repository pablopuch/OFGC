<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('project_id') }}
            {{ Form::text('project_id', $solistProject->project_id, ['class' => 'form-control' . ($errors->has('project_id') ? ' is-invalid' : ''), 'placeholder' => 'Project Id']) }}
            {!! $errors->first('project_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('soloists_id') }}
            {{ Form::text('soloists_id', $solistProject->soloists_id, ['class' => 'form-control' . ($errors->has('soloists_id') ? ' is-invalid' : ''), 'placeholder' => 'Soloists Id']) }}
            {!! $errors->first('soloists_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>