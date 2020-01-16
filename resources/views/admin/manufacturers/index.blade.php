@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Manufacturers</h1>
                        <a href="{{ URL::to('admin/manufacturers/create') }}" class="btn btn-success">Add manufacturer</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <table class="table table-light table-bordered">
                            <thead>
                            <tr class="bg-success">
                                <th>ID</th>
                                <th>Manufacturer</th>
                                <th>Actions</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($manufacturers as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{$value->name}}</td>
                                    <td> <a href="{{ route('manufacturers.edit', $value->id) }}" class="btn btn-primary">Edit </a> </td>
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
