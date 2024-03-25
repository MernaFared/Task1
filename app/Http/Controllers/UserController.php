<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'fullname' => 'required|string',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
            'status' => 'string|in:active,inactive'
        ]);
        $rolesAsString = implode(',', $request->roles);

        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'role' => $rolesAsString,
            'password' => Hash::make($request->password),
            'email'=> $request->username  . "@gmail.com",
            'status' => $request->status ?? 'inactive'
        ]);
         $user->assignRole($request->roles);
        activity('Add User')
            ->causedBy(auth()->user())
            ->log('User created: ' . $user->username);

        return response()->json(['message' => 'User created successfully',
        'user' => $user,
           ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'fullname' => 'required',
            'password' => 'required|min:6',
            'roles' => 'required|array',
            'status' => 'string|in:active,inactive',
        ]);

        $user->update([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => bcrypt($request->password),
            'status' => $request->status ?? $user->status,
        ]);

        // $status = $user->isActive() ? 'active' : 'inactive';
        $user->syncRoles($request->roles);

        activity('Edit User')
            ->causedBy(auth()->user())
            ->log('User updated: ' . $user->username);

        return response()->json(['message' => 'User updated successfully',
        'user' => $user,
                 ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        $user->delete();

        activity('Delete User')
        ->causedBy(auth()->user())
        ->log('User deleted: ' . $user->username);
        return response()->json(['message'=>'User with id '.$id. ' deleteed succefully'], 200);
    }
}

// public function assignRole(Request $request, User $user, Role $role)
//     {
//         // Check if the user already has the role
//         if ($user->hasRole($role)) {
//             return response()->json(['message' => 'User already has this role'], 400);
//         }

//         // Assign the role to the user
//         $user->assignRole($role);

//         return response()->json(['message' => 'Role assigned successfully'], 200);
//     }
