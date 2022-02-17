@extends('layouts.app')

@section('template_title')
    {{ $season->name ?? 'Show Season' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Season</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('seasons.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $season->name }}
                        </div>
                        <div class="form-group">
                            <strong>Stardate:</strong>
                            {{ $season->starDate }}
                        </div>
                        <div class="form-group">
                            <strong>Enddate:</strong>
                            {{ $season->endDate }}
                        </div>
                        <div class="form-group">
                            <strong>Noteseason:</strong>
                            {{ $season->noteSeason }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
