@extends('layouts.app')

@section('template_title')
    {{ $typeShedule->name ?? 'Show Type Shedule' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Type Shedule</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-shedules.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $typeShedule->name }}
                        </div>
                        <div class="form-group">
                            <strong>Hour Range Type:</strong>
                            {{ $typeShedule->hour_range_type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
