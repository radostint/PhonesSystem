@section('title','Edit '.$user->name . "'s Profile")
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-white border-dark">
                    <div class="card-header" style="background-color: rgb(37, 115, 143)"><h3>Edit user</h3></div>
                    <div class="card-body" style="background-color: #32383e">
                        <form method="post" action="{{action('Admin\UsersController@update', $id)}}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row">
                                <div class="col">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                           value="{{$user->name}}">
                                </div>
                                <div class="col">
                                    <label>Email</label>
                                    <input type="text" class="form-control"
                                           placeholder="email"
                                           name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-auto">
                                    <label>Rights</label>
                                    <select name="isAdmin" class="form-control" required>
                                        @if($user->isAdmin)
                                            <option value="0">User</option>
                                            <option value="1" selected>Administrator</option>
                                        @else
                                            <option value="0" selected>User</option>
                                            <option value="1" selected>Administrator</option>
                                        @endif
                                    </select>

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
