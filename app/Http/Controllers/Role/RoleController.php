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

            // return redirect()->back()->with('role_msg', "Successflly Role has been saved!");
            // $roles= Role::get();
            // $permissions= Permission::get();
            // return redirect()->back()->with(['rols'=> $roles, 'permissionss'=> $permissions]);

            return redirect()->route('roles')->with('role_msg', "Successflly Role has been saved!");
        } catch (Exception $error) {

            DB::rollBack();

            return response([
                'message' => 'Internal Server Error !',
                'error' => $error->getMessage(),
            ], 500);
        }
        // return view('backend.role.add-role');
    }


    // Individual permission role wise
    public function permissionList($id)
    {

        $role =  Role::with('permissions')->where('id', $id)->get();
        // return $role;
        // return (gettype($role));

        if ($role) {
            return view('backend.permission.permission-list', compact('role'));
        } else {
            return redirect()->back()->with(['fail' => 'Record is Not Found!']);
        }
    }

    public function editRole($id)
    {
        $role = Role::where('id', $id)->first();
        // return $role;
        return view('backend.role.edit-role', compact('role'));
    }

    public function postEditRole(Request $request, $id)
    {
        $role = Role::where('id', $id)->first();

        if ($role) {
            $role->name = $request->role ? $request->role :  $role->name;
            $role->description = $request->description ? $request->description :  $role->description;

            $role->save();

            return redirect()->route('roles')->with(['success' => "Successfully Edit Role!"]);
        } else {
            return redirect()->route('roles')->with(['success' => "Record  Not Found!"]);
        }
    }

    public function removeRole($id)
    {
        $child_role = RolePermission::where('role_id', $id)->get();

        if (count($child_role) > 0) {
            foreach ($child_role as $role) {
                echo $role;
                $role->delete();
            }
        }

        $record =  Role::where('id', $id)->first();

        if ($record) {
            $record->delete();
        }
        return redirect()->back()->with(['success' => 'Seccessfully Deleted the Record!']);
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

    // All role with  permission list
    public function rolewisePermissionIndex()
    {
        $roles =  Role::with('permissions')->get();

        return view('backend.permission.rolewise-permission', compact('roles'));
    }
}
