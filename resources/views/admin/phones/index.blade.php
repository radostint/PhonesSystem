@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Samples
                        <a href="{{ URL::to('admin/samples/create') }}" class="pull-right">Add Sample</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (\Session::has('success'))
                            <div class="alert alert-info">{{\Session::get('success') }}</div>
                        @endif

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Sample</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phones as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{$value->manufacturer->name}}</td>
                                    <td>{{$value->model}}</td>
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
