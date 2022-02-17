@extends('layouts.app')

@section('template_title')
    Shedule
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Shedule') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('shedules.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Project Id</th>
										<th>Type Id</th>
										<th>Room Id</th>
										<th>Date</th>
										<th>Hour Range</th>
										<th>Note</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shedules as $shedule)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $shedule->project_id }}</td>
											<td>{{ $shedule->type_id }}</td>
											<td>{{ $shedule->room_id }}</td>
											<td>{{ $shedule->date }}</td>
											<td>{{ $shedule->hour_range }}</td>
											<td>{{ $shedule->note }}</td>

                                            <td>
                                                <form action="{{ route('shedules.destroy',$shedule->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('shedules.show',$shedule->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('shedules.edit',$shedule->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $shedules->links() !!}
            </div>
        </div>
    </div>
@endsection
