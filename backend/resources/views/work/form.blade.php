<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('composer_id') }}
            {{ Form::text('composer_id', $work->composer_id, ['class' => 'form-control' . ($errors->has('composer_id') ? ' is-invalid' : ''), 'placeholder' => 'Composer Id']) }}
            {!! $errors->first('composer_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $work->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duration') }}
            {{ Form::text('duration', $work->duration, ['class' => 'form-control' . ($errors->has('duration') ? ' is-invalid' : ''), 'placeholder' => 'Duration']) }}
            {!! $errors->first('duration', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('orchestration_work') }}
            {{ Form::text('orchestration_work', $work->orchestration_work, ['class' => 'form-control' . ($errors->has('orchestration_work') ? ' is-invalid' : ''), 'placeholder' => 'Orchestration Work']) }}
            {!! $errors->first('orchestration_work', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('string_work') }}
            {{ Form::text('string_work', $work->string_work, ['class' => 'form-control' . ($errors->has('string_work') ? ' is-invalid' : ''), 'placeholder' => 'String Work']) }}
            {!! $errors->first('string_work', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $work->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>