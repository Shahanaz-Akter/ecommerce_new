<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\ImageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\ImageFile;

class UserController extends Controller
{
    public function user()
    {

        $users =  User::get();
        $roles = Role::get();
        return view('backend.user.users', compact('users', 'roles'));
    }
    public function addUser()
    {

        $users =  User::get();
        return view('backend.user.add-user');
    }

    public function postAddUser(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'date' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        try {

            $user_img = $request->file('user_img');
            // dd( $user_img);

            DB::beginTransaction();

            $imageFilesId = null;

            if ($user_img != null) {

                $originalName = $user_img->getClientOriginalName();
                $extension = $user_img->getClientOriginalExtension();
                $uniqueName = uniqid() . '.' . $extension;

                $fileSizeInBytes = $user_img->getSize();
                $file_size = $this->humanReadableFileSize($fileSizeInBytes);


                $relativePath = '/uploads/' . $uniqueName;

                $user_img->move(public_path('uploads'), $uniqueName);

                $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d H:i:s');

                $image_files = new ImageFiles();
                $image_files->original_name = $originalName;
                $image_files->absolute_path = $relativePath;

                $image_files->date = $date;
                $image_files->extension = $extension;
                $image_files->file_size = $file_size;

                $image_files->save();

                $imageFilesId = $image_files->id;
            }

            $user = new User();
            $user->username = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->p_example = $request->password;

            $user->image_files_id = $imageFilesId;

            $user->save();

            DB::commit();

            return redirect()->route('users')->with('success', 'Successfully Saved User!');
        } catch (Exception $ex) {

            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    private function humanReadableFileSize($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $unitIndex = 0;

        while ($size >= 1024 && $unitIndex < count($units) - 1) {
            $size /= 1024;
            $unitIndex++;
        }

        return round($size, $precision) . ' ' . $units[$unitIndex];
    }

    public function assignUserRole($user_id)
    {
        $roles = Role::get();

        return view('backend.role.assign_roles', compact('user_id', 'roles'));
    }

    public function postRoleAssign(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();

        if ($user) {
            $user->role_id = $request->role_id;
            $user->save();
            return redirect()->route('users')->with('success', "Role Assigned Successfully");
        } else {
            return redirect()->back();
        }
    }


    public function editUser($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $image = $user->imageFiles;

        return view('backend.user.edit-user', compact('user', 'image'));
    }


    public function ppAddUser(Request $request)
    {

        // dd($request->all());
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'date' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        try {

            $user_img = $request->file('user_img');
            // dd( $user_img);

            DB::beginTransaction();

            $imageFilesId = null;

            if ($user_img != null) {

                $originalName = $user_img->getClientOriginalName();
                $extension = $user_img->getClientOriginalExtension();
                $uniqueName = uniqid() . '.' . $extension;

                $fileSizeInBytes = $user_img->getSize();
                $file_size = $this->humanReadableFileSize($fileSizeInBytes);


                $relativePath = '/uploads/' . $uniqueName;

                $user_img->move(public_path('uploads'), $uniqueName);

                $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d H:i:s');

                $image_files = new ImageFiles();
                $image_files->original_name = $originalName;
                $image_files->absolute_path = $relativePath;

                $image_files->date = $date;
                $image_files->extension = $extension;
                $image_files->file_size = $file_size;

                $image_files->save();

                $imageFilesId = $image_files->id;
            }

            $user = new User();
            $user->username = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->p_example = $request->password;

            $user->image_files_id = $imageFilesId;

            $user->save();

            DB::commit();

            return redirect()->route('users')->with('success', 'Successfully Saved User!');
        } catch (Exception $ex) {

            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }



    public function postEditUser(Request $request, $user_id, $image_id)
    {
        $rules = [];

        if ($request->has('user_name')) {
            $rules['user_name'] = 'required|string|max:255';
        }

        if ($request->has('email')) {
            $rules['email'] = 'required|string|email|max:255|unique:users,email,' . $user_id;
        }

        if ($request->has('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        if ($request->has('date')) {
            $rules['date'] = 'required';
        }

        $validatedData = $request->validate($rules);

        try {
            // Start transaction
            DB::beginTransaction();

            // Retrieve user and image
            $user = User::findOrFail($user_id);
            $image = ImageFiles::findOrFail($image_id);

            $user_img = $request->file('user_img');

            if ($user_img != null) {
                $originalName = $user_img->getClientOriginalName();
                $extension = $user_img->getClientOriginalExtension();
                $uniqueName = uniqid() . '.' . $extension;
                $fileSizeInBytes = $user_img->getSize();
                $file_size = $this->humanReadableFileSize($fileSizeInBytes);
                $relativePath = '/uploads/' . $uniqueName;

                // Move the uploaded file to the uploads directory
                $user_img->move(public_path('uploads'), $uniqueName);

                $date = $request->has('date') ? \Carbon\Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d H:i:s') : $image->date;

                // Update the image file record
                $image->original_name = $originalName;
                $image->absolute_path = $relativePath;
                $image->date = $date;
                $image->extension = $extension;
                $image->file_size = $file_size;

                $image->save();
            }

            // Update user details
            $user->first_name = $request->first_name ? $request->first_name : $user->first_name;
            $user->last_name = $request->last_name ? $request->last_name : $user->last_name;
            $user->state = $request->state ? $request->state : $user->state;
            $user->zip_code = $request->zip_code ? $request->zip_code : $user->zip_code;
            $user->city = $request->city ? $request->city : $user->city;
            $user->contact = $request->contact ? $request->contact : $user->contact;

            $user->username = $request->has('user_name') ? $request->user_name : $user->username;
            $user->email = $request->has('email') ? $request->email : $user->email;
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
                $user->p_example = $request->password;
            }

            $user->save();

            // Commit transaction
            DB::commit();

            return redirect()->route('users')->with('success', 'Successfully Edited User!');
        } catch (Exception $ex) {
            // Rollback transaction in case of an error
            DB::rollBack();

            return response([
                'Failure' => 'Internal server Error',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


    public function removeUser($user_id)
    {
        $user = User::where('id', $user_id)->first();
        if ($user) {
            $user->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function viewUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $role =  $user->role;
        $img = $user->imageFiles;

        // dd($img);

        return view('backend.user.view_user', compact('role', 'user', 'img'));
        dd($user);
    }
}
