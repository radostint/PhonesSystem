@section('title','Edit '.$phone->manufacturer->name.' '.$phone->model)
@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->first('model'))
            <div class="row justify-content-center">
                <div class="alert alert-danger"> {{$errors->first('model')}}</div>
            </div>
        @endif
        @if($errors->first('year'))
            <div class="row justify-content-center">
                <div class="alert alert-danger"> {{$errors->first('year')}}</div>
            </div>
        @endif
        @if($errors->first('manufacturerId'))
            <div class="row justify-content-center">
                <div class="alert alert-danger"> {{$errors->first('manufacturerId')}}</div>
            </div>
        @endif
        @if($errors->first('image'))
            <div class="row justify-content-center">
                <div class="alert alert-danger"> {{$errors->first('image')}}</div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Currently editing {{$phone->manufacturer->name}} {{$phone->model}}</h3>
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
                                    <img src="{{asset('storage/' . $phone->image)}}" style="width: 200px;"
                                         class="mb-3 ml-auto mr-auto">
                                </div>
                                @if($phone->image != "images/phones/default.jpg")
                                    <div class="row justify-content-center">
                                        <form action="{{action('PhonesController@delete_image', $id)}}"
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
                            <div class="col">
                                <form method="post" enctype="multipart/form-data"
                                      action="{{action('PhonesController@update', $id)}}" autocomplete="off">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="form-group row">
                                        <div class="col">
                                            <label>Manufacturer</label>
                                            <select name="manufacturerId" class="custom-select mr-sm-2">
                                                <option value="{{$phone->manufacturerId}}"
                                                        selected>{{$phone->manufacturer->name}}</option>
                                                <option disabled>-------------------</option>
                                                @foreach($manufacturers as $manufacturer)
                                                    @if($manufacturer->name != $phone->manufacturer->name)
                                                        <option value="{{$manufacturer->id}}">
                                                            {{$manufacturer->name}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Model</label>
                                            <input type="text" name="model" class="form-control"
                                                   value="{{$phone->model}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>Year of release</label>
                                            <select name="year" class="custom-select">
                                                <option value="{{$phone->year}}" selected>{{$phone->year}}</option>
                                                <option disabled>------</option>
                                                @for($x=2020;$x>=2000;$x--)
                                                    @if($phone->year != $x)
                                                        <option value="{{$x}}">{{$x}}</option>
                                                    @endif
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label>Photo</label> <br/>
                                            <input type="file" name="image">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
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


