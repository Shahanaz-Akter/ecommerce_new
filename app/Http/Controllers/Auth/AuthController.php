<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{



    public function supplierDashboard()
    {

        return view('backend.layouts.supplier_dashboard');
    }

    public function managerDashboard()
    {

        return view('backend.layouts.manager_dashboard');
    }


    public function dashboard()
    {

        return view('backend.layouts.dashboard');
    }

    public function register()
    {
        return view('backend.auth.sign-up');
    }

    public function postRegister(Request $request)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'username' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'p_example' => 'example__' . $request->password,
            'status' => 'active',
        ]);


        Auth::login($user);

        // dd( $user_role);

        if ($user) {

            return redirect()->route('admin.dashboard');
        } else {

            return redirect()->back();
        }
    }

    public function login()
    {
        return view('backend.auth.sign-in');
    }

    public function postLogin(Request $request)
    {

        // $credentials = $request->only('email', 'password');
        // $auth_user = Auth::attempt($credentials);

        $auth_user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // $user_info = User::where('email', $request->email)->first();
        $user = Auth::user();

        $role =  $user->role;
        // dd($role);

        if ($auth_user && $role->name == "super admin") {

            return redirect()->route('admin.dashboard');
        } 
        
        elseif ($auth_user && $role->name == "admin") {

            return redirect()->route('admin.dashboard');
        }
        
        elseif ($auth_user && $role->name == "supplier") {

            return redirect()->route('supplier.dashboard');
        }
        elseif ($auth_user && $role->name == "manager") {

            return redirect()->route('manager.dashboard');
        }

         else {

            return back()->withErrors([
                'error' => "The provided credentials  did not Match!"
            ]);
        }
    }

    public function forget()
    {
        return view('backend.auth.forgot-password');
    }
    public function postForget(Request $request)
    {
        $email =  $request->email;
        $user = User::where('email', $email)->first();

        if ($user) {
            // return view('backend.auth.update-password', compact('user'));
            // dd('dxfgdf'.$user);
            return redirect()->route('update.password', $user);
        } else {
            return back()->withErrors([
                'error' => "User not found!"
            ]);
        }
    }

    public function updatePassword(Request $request, $userId)
    {
        return view('backend.auth.update-password', compact('userId'));
    }

    public function postUpdatePassword(Request $request, $userId)
    {

        $password =  $request->password;
        $confirmPassword = $request->password_confirmation;

        $valid_data = $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $match = $password === $confirmPassword;

        if ($valid_data) {

            $user = User::findOrFail($userId);

            $user->password =  Hash::make($valid_data['password']);
            $user->p_example = 'example__' . $password;
            $user->save();

            return redirect()->route('admin.login');
        } else {
            return back()->withErrors(['error' => "New Password and confirm Password did not Match!"]);
        }
    }


    public function terms()
    {
        return view('backend.auth.terms-condition');
    }
    public function privacy()
    {
        return view('backend.auth.privacy-policy');
    }
}
