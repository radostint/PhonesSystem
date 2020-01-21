@section('title','Manufacturers')
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-md-8 col-md-offset-2 justify-content-center">
                @if(Auth::user()->isAdmin)
                    <h3 class="text-sm-center text-white">ADMIN PANEL - MANUFACTURERS</h3>
                    <a href="{{ URL::to('manufacturers/create') }}" class="btn btn-primary float-right">Add manufacturer</a>
                @else
                    <h1 class="text-sm-center text-white">MANUFACTURERS</h1>
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
        <div class="row">
            <div class="col-md-10 offset-1">
                @foreach($manufacturers->chunk(4) as $chunk)
                    <div class="row mb-5">
                        @foreach($chunk as $manufacturer)
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('storage/' . $manufacturer->image)}}"
                                         alt="phone"
                                         style="width: 100%;object-fit: cover;height: 174px;">
                                    <div class="card-body" style="background-color: antiquewhite">
                                        <h5 class="card-title">{{$manufacturer->name}}</h5>
                                        @if(Auth::user()->isAdmin)
                                            <a href="{{ route('manufacturers.edit', $manufacturer->id) }}"
                                               class="btn btn-primary">Edit</a>
                                            <form
                                                action="{{action('ManufacturersController@destroy', $manufacturer->id )}}"
                                                method="post" class="d-inline">
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
