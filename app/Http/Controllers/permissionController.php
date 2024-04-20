<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

//use Spatie\Permission\Contracts\Permission;

class permissionController extends Controller
{
    public function index()
    {

        return view('role-permission.permission.index', [
            'data' => Permission::all()
        ]);
    }

    public function create()
    {
        return view('role-permission.permission.create');
    }

    public function store(Request $req)
    {
        // $per = Permission::findByName($req->name);

        // if ($per) {
        //     return back()->with("error", "permission already exist");
        // }

        $validate = $req->validate([
            "name" => ['required', 'string', 'unique:permissions,name']
        ]);
        Permission::create([
            "name" => $req->name
        ]);

        return redirect()->to(route('home'))->with('success', "Permission created successfully");
    }

    public function edit($id)
    {
        $p = Permission::findById($id);
        return view('role-permission.permission.edit', compact('p'));
    }

    public function update(Request $req)
    {
        $p = Permission::findById($req->id);
        $p->name = $req->name;
        $p->save();
        return redirect()->to(route('home'))->with('success', "Permission updated successfully");
    }
    public function destroy($id)
    {
        $p = Permission::findById($id);

        $p->delete();

        return back()->with('success', "permission removed successfully");
    }
}