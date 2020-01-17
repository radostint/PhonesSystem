@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="text-sm-center text-white">Your profile</h1>
                <img src="storage/{{$user->avatar}}/"
                     style="width: 18rem; float: left; border-radius: 50%; margin-right: 25px;">
                <table class="table table-striped table-dark col-md-4">
                    <thead>
                    <tr>
                        <th scope="col">Username: </th>
                        <td scope="col">{{$user->name}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Email:</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    @if($user->isAdmin)
                    <tr>
                        <th scope="row">Role</th>
                        <td>Administrator</td>
                    </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <label style="display: block">Update profile image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="btn btn-sm btn-primary" value="Upload photo">
                </form>
            </div>

        </div>
    </div>
@endsection
