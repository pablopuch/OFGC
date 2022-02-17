@extends('layouts.app')

@section('template_title')
    {{ $playlist->name ?? 'Show Playlist' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Playlist</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('playlists.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Project Id:</strong>
                            {{ $playlist->project_id }}
                        </div>
                        <div class="form-group">
                            <strong>Composer Id:</strong>
                            {{ $playlist->composer_id }}
                        </div>
                        <div class="form-group">
                            <strong>Work Id:</strong>
                            {{ $playlist->work_id }}
                        </div>
                        <div class="form-group">
                            <strong>Orchestration Total:</strong>
                            {{ $playlist->orchestration_total }}
                        </div>
                        <div class="form-group">
                            <strong>Order:</strong>
                            {{ $playlist->order }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
