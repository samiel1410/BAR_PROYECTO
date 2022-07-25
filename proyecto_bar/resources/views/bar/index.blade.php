@extends('layouts.app')

@section('template_title')
    Bar
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bar') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('bars.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Campus </th>
										<th>Nombre</th>
										<th>Abierto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bars as $bar)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>  @foreach((\App\Models\Campus::all() ?? [] ) as $campus)
                    @if($bar->campus_id == old('campus_id', $campus->id))  
                   {{$campus->nombre}}                
                                 
                    @endif                
                @endforeach  </td>
											<td>{{ $bar->nombre }}</td>
											<td>@if($bar->abierto== ('1'))
                        SI 
                        @else NO
                        @endif </td>

                                            <td>
                                                <form action="{{ route('bars.destroy',$bar->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bars.show',$bar->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bars.edit',$bar->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $bars->links() !!}
            </div>
        </div>
    </div>
@endsection
