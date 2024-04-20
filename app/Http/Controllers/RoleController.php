<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        return view('role-permission.role.index', [
            'data' => Role::all()
        ]);
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $req)
    {
        // $per = Role::findByName($req->name);

        // if ($per) {
        //     return back()->with("error", "Role already exist");
        // }

        $validate = $req->validate([
            "name" => ['required', 'string', 'unique:roles,name']
        ]);
        Role::create([
            "name" => $req->name
        ]);

        return redirect()->to(route('roles.home'))->with('success', "Role created successfully");
    }

    public function edit($id)
    {
        $p = Role::findById($id);
        return view('role-permission.role.edit', compact('p'));
    }

    public function update(Request $req)
    {
        // dd($req);
        $p = Role::findById($req->id);
        $p->name = $req->name;
        $p->save();
        return redirect()->to(route('roles.home'))->with('success', "Role updated successfully");
    }
    public function destroy($id)
    {
        $p = Role::findById($id);

        $p->delete();

        return back()->with('success', "Role removed successfully");
    }



    public function givePermission($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('pages.give', ['role' => $role, 'permission' => $permission, 'rolePermissions' => $rolePermissions]);
    }

    public function updatePermission(Request $req, $id)
    {
        $req->validate([
            'permission' => "required"
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions($req->permission);

        return redirect()->back()->with('success', "permission assign to role");
    }
}
