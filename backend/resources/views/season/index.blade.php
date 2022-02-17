@extends('layouts.app')

@section('template_title')
    Season
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Season') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('seasons.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Stardate</th>
										<th>Enddate</th>
										<th>Noteseason</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seasons as $season)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $season->name }}</td>
											<td>{{ $season->starDate }}</td>
											<td>{{ $season->endDate }}</td>
											<td>{{ $season->noteSeason }}</td>

                                            <td>
                                                <form action="{{ route('seasons.destroy',$season->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('seasons.show',$season->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('seasons.edit',$season->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $seasons->links() !!}
            </div>
        </div>
    </div>
@endsection
