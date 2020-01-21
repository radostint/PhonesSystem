@section('title','Admin Panel - Users')
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <!-- LIST -->
            <div class="col-md-10 text-sm-center">
                <form id="form-list-client">
                    <h3 class="text-sm-center text-white">ADMIN PANEL - USERS</h3>
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
                                <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{action('Admin\UsersController@destroy', $user->id )}}"
                                          method="post" class="d-inline">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                            Delete
                                        </button>
                                    </form>
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


