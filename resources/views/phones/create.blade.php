@section('title','Add New Phone')
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Add new manufacturer</h3></div>

                    <div class="card-body">
                        <form method="post" action="{{url('phones')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col">
                                    <label>Manufacturer</label>
                                    <select name="manufacturerId" class="custom-select mr-sm-2">
                                        <option selected disabled>Choose manufacturer...</option>
                                        @foreach($manufacturers as $manufacturer)
                                            <option value="{{$manufacturer->id}}">
                                                {{$manufacturer->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <labe>Model</labe>
                                    <input type="text" name="model" class="form-control" placeholder="Model Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>Year of release</label>
                                    <select name="year" class="custom-select">
                                        <option selected disabled>Choose year...</option>
                                        @for($x=2020;$x>=2000;$x--)
                                            <option value="{{$x}}">{{$x}}</option>
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

