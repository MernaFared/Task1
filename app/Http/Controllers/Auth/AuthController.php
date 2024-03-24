<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'password' => 'required|confirmed',
            // 'email' => 'required|email|unique:users',
        ]);

        $user = User::create([
            'username' => $request->username,
            // 'name' => $request->username,
            'role' => 'user',
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'email'=> $request->username  . "@gmail.com",
            //'email'=> $request->email
         ]);

        $token = $user->createToken('TASK1')->accessToken;

     // Assign a role to the user
    //  $role = ModelsRole::where('name', 'User')->first(); // Assuming 'user' is the role name
    //  $user->assignRole($role);
    // $role = Role::where('name', 'user')->first();
    // $user->assignRole($role);

        return response()->json([ 'user' => $user, 'token' => $token],200);

     }

    public function login(Request $request)

    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($data)) {
            return response()->json(['error_message' => 'Incorrect credentials. Please try again'], 401);
        }



        $user = User::find(Auth::user()->id);

        $token = $user->createToken('TASK1')->accessToken;

        return response(['user' => $user, 'token' => $token]);

    }


}
