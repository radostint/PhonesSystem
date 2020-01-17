@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <!-- LIST -->
            <div class="col-md-10 text-sm-center">
                <form id="form-list-client">
                    <legend class="text-sm-center text-white">ADMIN PANEL - USERS</legend>
                    <table class="table table-bordered table-condensed table-hover table-dark">
                        <thead style="background-color: #25738f; color: white;">
                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Administrator</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="form-list-client-body">
                        @foreach($users as $user)
                            <tr>
                                <td><img src="../storage/{{$user->avatar}}" style="width: 62px; height: 62px;"> </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->isAdmin)
                                        Administrator
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                    <!--<button type="button" class="btn btn-primary">View</button>-->
                                    <button type="button" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

@endsection


