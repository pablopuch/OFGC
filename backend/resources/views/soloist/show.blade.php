@extends('layouts.app')

@section('template_title')
    {{ $soloist->name ?? 'Show Soloist' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Soloist</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('soloists.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $soloist->name }}
                        </div>
                        <div class="form-group">
                            <strong>Titlesoloist:</strong>
                            {{ $soloist->titleSoloist }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
