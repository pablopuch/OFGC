@extends('layouts.app')

@section('template_title')
    {{ $shedule->name ?? 'Show Shedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Shedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('shedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $shedule->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Type Id:</strong>
                            {{ $shedule->type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Room Id:</strong>
                            {{ $shedule->room_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $shedule->date }}
                        </div>
                        <div class="form-group">
                            <strong>Hour Range:</strong>
                            {{ $shedule->hour_range }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $shedule->note }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
