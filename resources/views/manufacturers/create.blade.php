@section('title','Add Manufacturer')
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Add new manufacturer</h3></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-auto">
                                @if($errors->first('name'))
                                    <div class="alert alert-danger col-md-6"> {{$errors->first('name')}}</div>
                                @endif
                                <form method="post" action="{{url('manufacturers')}}" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {{csrf_field()}}
                                                <label>Name</label>
                                                <input type="text" class="form-control"
                                                       placeholder="Manufacturer name ..."
                                                       name="name">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Photo</label> <br/>
                                                <input type="file" name="image">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
