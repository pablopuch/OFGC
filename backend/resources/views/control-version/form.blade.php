<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('project_id') }}
            {{ Form::text('project_id', $controlVersion->project_id, ['class' => 'form-control' . ($errors->has('project_id') ? ' is-invalid' : ''), 'placeholder' => 'Project Id']) }}
            {!! $errors->first('project_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('starDate') }}
            {{ Form::text('starDate', $controlVersion->starDate, ['class' => 'form-control' . ($errors->has('starDate') ? ' is-invalid' : ''), 'placeholder' => 'Stardate']) }}
            {!! $errors->first('starDate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('upgradeDate') }}
            {{ Form::text('upgradeDate', $controlVersion->upgradeDate, ['class' => 'form-control' . ($errors->has('upgradeDate') ? ' is-invalid' : ''), 'placeholder' => 'Upgradedate']) }}
            {!! $errors->first('upgradeDate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('published') }}
            {{ Form::text('published', $controlVersion->published, ['class' => 'form-control' . ($errors->has('published') ? ' is-invalid' : ''), 'placeholder' => 'Published']) }}
            {!! $errors->first('published', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>