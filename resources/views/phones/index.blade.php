@section('title','Phones')
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-md-8 col-md-offset-2 justify-content-center">
                @if(Auth::user()->isAdmin)
                    <h3 class="text-sm-center text-white">ADMIN PANEL - PHONES</h3>
                    <a href="{{ URL::to('phones/create') }}" class="btn btn-primary float-right">Add phone</a>
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
        <div class="row">
            <div class="col-md-10 offset-1">
                @foreach($phones->chunk(4) as $chunk)
                    <div class="row mb-5">
                        @foreach($chunk as $phone)
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('storage/' . $phone->image)}}" alt="phone"
                                         style="width: 100%;object-fit: cover;height: 215px;">
                                    <img class="card-img-top" src="{{asset('storage/' . $phone->manufacturer->image)}}"
                                         alt="phone"
                                         style="width: 40%;object-fit: cover;position:absolute;">
                                    <div class="card-body" style="background-color: antiquewhite">
                                        <h5 class="card-title">{{$phone->manufacturer->name}} {{$phone->model}}</h5>
                                        <p>Release year: {{$phone->year}}</p>
                                        @if(Auth::user()->isAdmin)
                                            <a href="{{ route('phones.edit', $phone->id) }}"
                                               class="btn btn-primary">Edit</a>
                                            <form action="{{action('PhonesController@destroy', $phone->id )}}"
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
