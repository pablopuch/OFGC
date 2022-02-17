@extends('layouts.app')

@section('template_title')
    Create Director
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Director</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('directors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('director.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
