<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('admin'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('pages.admin.user.list',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.edit', ['user' => null, 'title' => "Create User", 'action' => 'create', 'disabled' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->company = $request->input('company');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        if (isset($request->admin)) {
            $user->admin = true;
        } else {
            $user->admin = false;
        }
        if (isset($request->active)) {
            $user->active = true;
        } else {
            $user->active = false;
        }
        $user->save();
        return redirect('/admin/users')->with('success', 'User created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.admin.user.edit', ['user' => $user, 'title' => "View User", 'action' => 'show', 'disabled' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.admin.user.edit', ['user' => $user, 'title' => "Edit User", 'action' => 'edit',  'disabled' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(trim($request->input('password')) !== '') {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'password' => 'required|string|min:6'
            ]);
            $user->password = bcrypt($request->input('password'));
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id
            ]);
        }

        $user->name = $request->input('name');
        $user->company = $request->input('company');
        $user->email = $request->input('email');
        if (isset($request->admin)) {
            $user->admin = true;
        } else {
            $user->admin = false;
        }
        if (isset($request->active)) {
            $user->active = true;
        } else {
            $user->active = false;
        }
        $user->save();
        return redirect('/admin/users')->with('success', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
