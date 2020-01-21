<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Images;
use App\Http\Requests\ImageUpload;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{


    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {

        $path = $request->file('avatar')->store('images/avatars','public');
        $user = $request->user();
        $user->avatar = $path;
        $user->save();
        return view('profile', array('user' => Auth::user()));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->isAdmin = $request->get('isAdmin');
        $user->email = $request->get('email');
        $user->save();
        return redirect('admin/users')->with('success', 'Task was successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/users')->with('success', "Successfully deleted {$user->name}!");
    }
}
