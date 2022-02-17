@extends('layouts.app')

@section('template_title')
    {{ $directorProject->name ?? 'Show Director Project' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Director Project</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('director-projects.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $directorProject->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Director Id:</strong>
                            {{ $directorProject->director_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
