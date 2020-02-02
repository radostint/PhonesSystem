<?php
$modelFiltered = request()->get('model');
$yearFiltered = request()->get('year');
$manufacturerFiltered = request()->get('manufacturerId');
if ($manufacturerFiltered) {
    $manufacturerFiltered = \App\Manufacturers::find($manufacturerFiltered);
}
?>
@section('title','Phones')
@extends('layouts.app')
@section('content')
    @if(!request()->is('search'))
        <div class="sidebar col-md-2">
            <div class="sidebar-item card card-body">
                <form action="{{ url('filter') }}" method="post">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                    <div class="form-group row">
                        <div class="col">
                            <label for="manufacturerId">Manufacturer</label>
                            <select name="manufacturerId" class="<?php if ($manufacturerFiltered) {
                                echo 'bg-success ';
                            } ?>custom-select mr-sm-2">
                                @if($manufacturerFiltered)
                                    <option
                                        value="{{$manufacturerFiltered->id}}">{{$manufacturerFiltered->name}}</option>
                                    <option value="">Remove filter</option>
                                @else
                                    <option value="" selected disabled>Manufacturer...</option>
                                @endif
                                <option disabled>-------------------</option>
                                @foreach($manufacturers as $manufacturer)
                                    @if($manufacturerFiltered && $manufacturer->id == $manufacturerFiltered->id)
                                    @else
                                        <option value="{{$manufacturer->id}}">
                                            {{$manufacturer->name}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="model">Model</label>
                            @if($modelFiltered)
                                <input type="text" name="model" class="form-control bg-success" placeholder="Model"
                                       value="{{$modelFiltered}}">
                            @else
                                <input type="text" name="model" class="form-control" placeholder="Model">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col">
                            <label for="year">Year of release</label>
                            <select name="year" class="<?php if ($yearFiltered) {
                                echo 'bg-success ';
                            } ?>custom-select">
                                @if($yearFiltered)
                                    <option value="{{$yearFiltered}}" selected>{{$yearFiltered}}</option>
                                    <option value="">Remove filter</option>
                                @else
                                    <option value="" selected disabled>Choose year...</option>
                                @endif
                                <option disabled>------</option>
                                @for($year=2020;$year>=2000;$year--)
                                    @if($yearFiltered && $yearFiltered == $year)
                                    @else
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col mb-0 mt-auto">
                            <input type="submit" value="Filter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-md-8 col-md-offset-2 justify-content-center">
                @if(Auth::check() && Auth::user()->isAdmin)
                    <h3 class="text-sm-center text-white">ADMIN PANEL - PHONES</h3>
                    <a href="{{ URL::to('phones/create') }}" class="btn btn-primary float-right ">Add phone</a>
                    @if(request()->is('search'))
                        @if($phones->count())
                            <h6 class="alert alert-success">Showing results for "{{request()->get('query')}}:"</h6>
                        @else
                            <h6 class="alert alert-warning">No results found matching "{{request()->get('query')}}"</h6>

                        @endif
                    @endif
                @else
                    <h3 class="text-sm-center text-white">PHONES</h3>
                @endif
            </div>
        </div>
        <!-- will be used to show any messages -->
        @if (\Session::has('success'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success">{{\Session::get('success') }}</div>
                </div>
            </div>
        @endif
        @if (\Session::has('noParams'))
            <div class="row mb-1">
                <div class="col-md-3 offset-1">
                    <div class="alert alert-danger">{{\Session::get('noParams') }}</div>
                </div>
            </div>
        @endif
        @if(!empty($no_results))
            <div class="row mb-1 justify-content-center">
                <div class="col-md-3 offset-1 card card-body">
                    <div class="alert alert-warning">{{ $no_results }}</div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 offset-1">
                @foreach($phones->chunk(4) as $chunk)
                    <div class="row mb-5">
                        @foreach($chunk as $phone)
                            <div class="col-sm-3">
                                <div class="card"
                                     style="color:white;box-shadow: 0 5px 25px 5px black;background: linear-gradient(180deg,rgba(151, 222, 228, 0.75), transparent);padding: 2px;">
                                    <img class="card-img-top" src="{{asset('storage/' . $phone->image)}}" alt="phone"
                                         style="width: 100%;object-fit: cover;height: 215px;">
                                    <img class="card-img-top" src="{{asset('storage/' . $phone->manufacturer->image)}}"
                                         alt="phone"
                                         style="width: 35%;object-fit: cover;position:absolute;opacity: 90%">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="font-family: 'muli';font-weight: 800"> {{$phone->model}}</h5>
                                        <div>Release year: {{$phone->year}}</div>
                                        <div>ID: {{$phone->id}}</div>
                                        @if(Auth::check() && Auth::user()->isAdmin)
                                            <a href="{{ route('phones.edit', $phone->id) }}"
                                               class="btn btn-primary">Edit</a>
                                            <form action="{{action('PhonesController@destroy', $phone->id )}}"
                                                  method="post" class="d-inline" autocomplete="off">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
