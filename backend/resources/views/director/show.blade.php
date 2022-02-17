@extends('layouts.app')

@section('template_title')
    {{ $director->name ?? 'Show Director' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Director</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('directors.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $director->name }}
                        </div>
                        <div class="form-group">
                            <strong>Titledirector:</strong>
                            {{ $director->titleDirector }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
