<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // return roles with it's permissions
        $roles = Role::with('permissions')->get();
         return response()->json(['roles' => $roles], 200);
    }

    public function store(Request $request)
    {
        /*
        create role with name of role {super admin , admin ,user} &
          permissions {view users, create users ,edit users,delete users}
         */
        $request->validate([
            'name' => 'required|string|unique:roles',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        activity('Add Role')
        ->causedBy(auth()->user())
        ->performedOn($role)
        ->log('Role created: ' . $role->name);
        $lastActivity = Activity::all()->last();

        $lastActivity->subject;
        $subject = $lastActivity ? $lastActivity->subject : null;

        return response()->json(['message' => 'Role created successfully',
        'last_activty'=>$subject
     ], 200);
    }

    public function show($id)
    {
       //show single role data with it's associated permission
        $role = Role::findById($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        $role->load('permissions');
            return response()->json(['role' => $role], 200);
    }


    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $request->validate([
            'name' => 'required|string|unique:roles,name,'.$id,
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        $updatedRole = Role::findOrFail($id);

        activity('Edit Role')
        ->causedBy(auth()->user())
        ->performedOn($role)
        ->log('Role updated: ' . $role->name);
        $lastActivity = Activity::all()->last(); //returns the last logged activity

        $lastActivity->subject;
        return response()->json([
            'message' => 'Role updated successfully',
            'role' => $updatedRole // Return the updated role data
        ]);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role) {
             return response()->json(['message' => 'Role not found'], 404);
        }

        $role->delete();

            activity('Delete Role')
            ->causedBy(auth()->user())
            ->performedOn($role)
            ->log('Role deleted: ' . $role->name);

        return response()->json(['message' => 'Role deleted successfully']);

    }
}
