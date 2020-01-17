@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Edit Subject</h1>
                        <a href="{{ URL::to('admin/manufacturers') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        <form method="post" action="{{action('Admin\ManufacturersController@update', $id)}}">
                            <div class="form-group row">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="name" name="name" value="{{$manufacturer->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-5"></div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
