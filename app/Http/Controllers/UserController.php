<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('user.add', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'email' => 'required|unique:users,email',
            'password' => "required"
        ]);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            "password" => Hash::make($request->password)
        ]);

        $user->syncRoles($request->roles);

        return redirect()->to(route('user.index'))->with('success', "user created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck("name")->all();
        $userRoles = $user->roles->pluck("name")->all();
        return view('user.edit', ['user' => $user, 'roles' => $roles, "userRoles" => $userRoles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->syncRoles($request->roles);

        $user->save();

        return redirect()->to(route('user.index'))->with("success", "user updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back()->with('success', "user deleted successfully");
    }
}