@extends('layouts.app')

@section('template_title')
    {{ $controlVersion->name ?? 'Show Control Version' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Control Version</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('control-versions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $controlVersion->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Stardate:</strong>
                            {{ $controlVersion->starDate }}
                        </div>
                        <div class="form-group">
                            <strong>Upgradedate:</strong>
                            {{ $controlVersion->upgradeDate }}
                        </div>
                        <div class="form-group">
                            <strong>Published:</strong>
                            {{ $controlVersion->published }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
