<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('project_id') }}
            {{ Form::text('project_id', $playlist->project_id, ['class' => 'form-control' . ($errors->has('project_id') ? ' is-invalid' : ''), 'placeholder' => 'Project Id']) }}
            {!! $errors->first('project_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('composer_id') }}
            {{ Form::text('composer_id', $playlist->composer_id, ['class' => 'form-control' . ($errors->has('composer_id') ? ' is-invalid' : ''), 'placeholder' => 'Composer Id']) }}
            {!! $errors->first('composer_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('work_id') }}
            {{ Form::text('work_id', $playlist->work_id, ['class' => 'form-control' . ($errors->has('work_id') ? ' is-invalid' : ''), 'placeholder' => 'Work Id']) }}
            {!! $errors->first('work_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('orchestration_total') }}
            {{ Form::text('orchestration_total', $playlist->orchestration_total, ['class' => 'form-control' . ($errors->has('orchestration_total') ? ' is-invalid' : ''), 'placeholder' => 'Orchestration Total']) }}
            {!! $errors->first('orchestration_total', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('order') }}
            {{ Form::text('order', $playlist->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order']) }}
            {!! $errors->first('order', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>