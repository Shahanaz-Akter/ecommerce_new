<?php

namespace App\Http\Controllers\Role;

use Exception;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RolePermission;

class RoleController extends Controller
{
    public function role()
    {
        $roles =  Role::get();
        return view('backend.role.roles', compact('roles'));
    }

    public function addRole()
    {

        return view('backend.role.add-role');
    }

    public function postRole(Request $request)
    {
        // dd($request->all());

        $request->validate(
            [
                'role' => 'required | string | max:255',
                'description' => 'nullable | string',
            ],
            [
                'role.required' => 'Please enter valid  role name !',
                'role.string' => "Only alphabets, numbers & special characters are allowed. Must be a string !",
                'description.string' => "Enter valid Description.!",
            ]
        );

        DB::beginTransaction();

        try {

            $role = new Role();
            $role->name = strtolower($request->role);
            $role->description = $request->description;
            $role->save();

            DB::commit();

            return redirect()->back()->with('role_msg', "Successflly Role has been saved!");
        } catch (Exception $error) {

            DB::rollBack();

            return response([
                'message' => 'Internal Server Error !',
                'error' => $error->getMessage(),
            ], 500);
        }
        // return view('backend.role.add-role');
    }

    public function rolePermissionIndex()
    {
        $roles =  Role::get();
        $permissions =  Permission::get();
        // dd($roles, $permissions );
        return view('backend.role.role_permission', compact('roles', 'permissions'));
    }

    public function postRolePermissionIndex(Request $request)
    {

        // dd($request->all());
        // $role_id = $request->role_id;
        $permissions = $request->permissions;

        foreach ($permissions as $permission) {

            $role_permission = new RolePermission();
            $role_permission->role_id = $request->role_id;
            $role_permission->permission_id = $permission;
            $role_permission->save();
        }
        if ($permissions) {
            // return redirect()->route('users')->with('success', 'Successfully Associated Role and User User!');
            return redirect()->route('role.permission')->with('success', 'Successfully Associated Role and User User!');


        }
        // dd($permissions);
    }
}
