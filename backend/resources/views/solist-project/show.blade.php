@extends('layouts.app')

@section('template_title')
    {{ $solistProject->name ?? 'Show Solist Project' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Solist Project</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('solist-projects.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $solistProject->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Soloists Id:</strong>
                            {{ $solistProject->soloists_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
