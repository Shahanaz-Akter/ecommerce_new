<?php

namespace App\Http\Controllers\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;

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
            $role->name = $request->role;
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
}
