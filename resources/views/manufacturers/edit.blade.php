@section('title', "Edit $manufacturer->name")
@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->first('name'))
            <div class="row justify-content-center">
                <div class="alert alert-danger"> {{$errors->first('name')}}</div>
            </div>
        @endif
        @if($errors->first('image'))
            <div class="row justify-content-center">
                <div class="alert alert-danger"> {{$errors->first('image')}}</div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3>Currently editing {{$manufacturer->name}}</h3>
                    </div>
                    @if (\Session::has('success'))
                        <div class="row">
                            <div class="col-md-auto m-2">
                                <div class="alert alert-success">{{\Session::get('success') }}</div>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row justify-content-center">
                                    <img src="{{asset('storage/' . $manufacturer->image)}}" style="width: 200px;"
                                         class="mb-3 ml-auto mr-auto">
                                </div>
                                @if($manufacturer->image != "images/manufacturers/default.jpg")
                                    <div class="row justify-content-center">
                                        <form action="{{action('ManufacturersController@delete_image', $id)}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="POST">
                                            <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-auto">
                                <form method="post" action="{{action('ManufacturersController@update', $id)}}"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{$manufacturer->name}}"
                                               name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label> <br/>
                                        <input type="file" name="image">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
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

