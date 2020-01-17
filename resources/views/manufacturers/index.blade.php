@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->isAdmin)
                    <h1 class="text-sm-center">ADMIN PANEL</h1>
                    <h1 class="text-sm-center">Manufacturers</h1>
                    <a href="{{ URL::to('manufacturers/create') }}" class="btn btn-primary m-2">Add
                        manufacturer</a>
                @else
                    <h1 class="float-left">Manufacturers</h1>
                @endif
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>

                    <div class="panel-body col-md-7">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{{\Session::get('success') }}</div>
                        @endif
                        <table class="table table-light table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                @if(Auth::user()->isAdmin)
                                    <th>ID</th>
                                @endif
                                <th>Manufacturer</th>
                                @if(Auth::user()->isAdmin)
                                    <th>Actions</th>
                                @endif

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($manufacturers as $key => $value)
                                <tr>
                                    @if(Auth::user()->isAdmin)
                                        <td>{{ $value->id }}</td>
                                    @endif
                                    <td>{{$value->name}}</td>
                                    @if(Auth::user()->isAdmin)
                                        <td><a href="{{ route('manufacturers.edit', $value->id) }}"
                                               class="btn btn-warning">Edit</a>
                                            <form action="{{action('ManufacturersController@destroy', $value->id )}}"
                                                  method="post" class="d-inline">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
