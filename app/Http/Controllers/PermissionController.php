<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function permissionCreatePage()
    {
        return view('permisson.create-permission');
    }

    public function PermissionStoreDB(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validator->passes()) {
            Permission::create([
                'name' => $request->name
            ]);
            return redirect()->route('permisson.list')->with('success', 'Permission Added');
        } else {
            return redirect()->route('permission.create')->withInput()->withErrors($validator);
        }
    }

    public function PermissionList(){
        $permissions  = Permission::paginate(10);
        return view('permisson.list-permision', compact('permissions'));
    }

    // for edit controller 
    public function PermissionEdit($id){
        $permission = Permission::findOrFail($id);
       return view('permisson.edit-permission', compact('permission'));
    }

    public function PermissionUpdate(Request $request, $id){
        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3|unique:permissions,name,' . $id
        ]);
        if($validator->passes()){
           $permission->name = $request->name;
           $permission->save();
               return redirect()->route('permisson.list')->with('success', 'Permission Updated');
        } else {
            return redirect()->route('Permission.edit')->withInput()->withErrors($validator);
        }     
        }

    public function PermissionDelete(Request $request){
        $id = $request->id;
        $permission = Permission::findOrFail($id);
        if($permission == null){
            session()->flash('error', 'permission not found');
            return response()->json([
                'status' => false
            ]);
        }

        $permission->delete();
       session()->flash('success', 'Permission Delete');
       return response()->json([
        'status'=> true
       ]);
    }

   
}

