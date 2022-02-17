<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $season->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('starDate') }}
            {{ Form::text('starDate', $season->starDate, ['class' => 'form-control' . ($errors->has('starDate') ? ' is-invalid' : ''), 'placeholder' => 'Stardate']) }}
            {!! $errors->first('starDate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('endDate') }}
            {{ Form::text('endDate', $season->endDate, ['class' => 'form-control' . ($errors->has('endDate') ? ' is-invalid' : ''), 'placeholder' => 'Enddate']) }}
            {!! $errors->first('endDate', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('noteSeason') }}
            {{ Form::text('noteSeason', $season->noteSeason, ['class' => 'form-control' . ($errors->has('noteSeason') ? ' is-invalid' : ''), 'placeholder' => 'Noteseason']) }}
            {!! $errors->first('noteSeason', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>