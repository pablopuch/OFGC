@extends('layouts.app')

@section('template_title')
    Create Director Project
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Director Project</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('director-projects.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('director-project.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
