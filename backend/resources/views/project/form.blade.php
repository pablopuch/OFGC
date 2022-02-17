<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('season_id') }}
            {{ Form::text('season_id', $project->season_id, ['class' => 'form-control' . ($errors->has('season_id') ? ' is-invalid' : ''), 'placeholder' => 'Season Id']) }}
            {!! $errors->first('season_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $project->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('starDate') }}
            {{ Form::text('starDate', $project->starDate, ['class' => 'form-control' . ($errors->has('starDate') ? ' is-invalid' : ''), 'placeholder' => 'Stardate']) }}
            {!! $errors->first('starDate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('endDate') }}
            {{ Form::text('endDate', $project->endDate, ['class' => 'form-control' . ($errors->has('endDate') ? ' is-invalid' : ''), 'placeholder' => 'Enddate']) }}
            {!! $errors->first('endDate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('published') }}
            {{ Form::text('published', $project->published, ['class' => 'form-control' . ($errors->has('published') ? ' is-invalid' : ''), 'placeholder' => 'Published']) }}
            {!! $errors->first('published', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>