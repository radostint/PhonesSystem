@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading p-2">
                        <h1 class="float-left">Phones</h1>
                        @if(Auth::user()->isAdmin)
                            <a href="{{ URL::to('phones/create') }}" class="btn btn-primary m-2">Add Phone</a>
                        @endif
                    </div>

                    <div class="panel-body col-md-auto">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="bg-success">
                                @if(Auth::user()->isAdmin)
                                    <th>ID</th>
                                @endif
                                <th>Manufacturer</th>
                                <th>Model</th>
                                <th>Year released</th>
                                @if(Auth::user()->isAdmin)
                                    <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phones as $key => $value)
                                <tr>
                                    @if(Auth::user()->isAdmin)
                                        <td>{{ $value->id }}</td>
                                    @endif
                                    <td>{{$value->manufacturer->name}}</td>
                                    <td>{{$value->model}}</td>
                                    <td>{{$value->year}}</td>
                                    @if(Auth::user()->isAdmin)
                                        <td><a href="{{ route('phones.edit', $value->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('phones.destroy', $value->id) }}" class="btn btn-danger">Delete</a>
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
