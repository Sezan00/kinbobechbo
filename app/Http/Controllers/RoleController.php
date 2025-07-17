<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Facade;

class RoleController extends Controller
{
    public function index(){
        if(!FacadesAuth::guard('panel')->user()->can('createRole', Role::class)){
            abort(403);
        }
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create-role',[
            'permissions' => $permissions
        ]);
    }


    public function RoleStore(Request $request){
    $validator = Validator::make($request->all(),[
        'name' => 'required|unique:roles|min:3'
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
  
    $role = Role::create([
        'name'=> $request->name
    ]);

    if(!empty($request->permission)){
        $role->permissions()->attach($request->permission);
    }
    return redirect()->route('roles.list')->with('success', 'Roles Added');
    }

    public function RoleList(){
            $roles = Role::with('permissions')->paginate(10);
            return view('roles.role-list', compact('roles'));
     }

        public function RoleEdit($id){
            $role = Role::with('permissions')->findOrFail($id);
            if(!FacadesAuth::guard('panel')->user()->can('update', $role)){
                abort(401);
            }
            $hasPermissions = $role->permissions->pluck('name');
            $permissions = Permission::orderBy('name', 'asc')->get();
             return view('roles.edit-role', compact(
                    'role',
                    'permissions',
                    'hasPermissions'
                ));
        }

            public function RoleUpdate(Request $request, $id){
            $role = Role::findOrFail($id);

            $validator = Validator::make($request->all(),[
                'name' => 'required|min:3|unique:roles,name,' . $id
            ]);

            if ($validator->fails()) {
                return redirect()->route('edit.role', $id)->withErrors($validator)->withInput();
            }

            // Update role name
            $role->name = $request->name;
            $role->save();

            // Update permissions (Many-to-Many)
            $role->permissions()->sync($request->permission ?? []);

            return redirect()->route('roles.list')->with('success', 'Role updated successfully');
        }

        public function RoleDelete($id){
            $role = Role::findOrFail($id);
            if(!FacadesAuth::guard('panel')->user()->can('delete', $role)){
                abort(401);
            }
            $role->permissions()->detach();
            $role->delete();
            
            return redirect()->route('roles.list')->with('success', 'Role Delete successfully');
        }

}

