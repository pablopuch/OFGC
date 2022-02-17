<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $typeShedule->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hour_range_type') }}
            {{ Form::text('hour_range_type', $typeShedule->hour_range_type, ['class' => 'form-control' . ($errors->has('hour_range_type') ? ' is-invalid' : ''), 'placeholder' => 'Hour Range Type']) }}
            {!! $errors->first('hour_range_type', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>