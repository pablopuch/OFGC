@extends('layouts.app')

@section('template_title')
    {{ $composer->name ?? 'Show Composer' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Composer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('composers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $composer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Surname:</strong>
                            {{ $composer->surname }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
