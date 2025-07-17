<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Panel;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function AdminViewDashboard(){
        return view('admin.admin-view', [
            'totalCategories'=> Category::count(),
            'totalBrands'=> Brand::count(),
            'totalProducts'=> Product::count(),
            'totalUsers'=> User::count(),
            'totalPanelUser'=> panel::count()
        ]);
    }

    public function UserListForAdminView(){
        $panels = Panel::paginate(10);
        return view('admin.panel-user', compact('panels'));
    }

    public function EditPanelUser($id){
        $panel_user = Panel::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles = $panel_user->roles->pluck('id');
        return view('admin.edit-panel-user', compact('panel_user', 'roles', 'hasRoles'));
    }

    public function UpdatePanelUser(Request $request, $id){
        
        $panel_user = Panel::with('roles')->findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name'  => 'required|min:3',
            'email' => 'required|email|unique:panels,email,' . $id,
            'role'  => 'required|array',
            'role.*' => 'exists:roles,id',
   
        ]);
        if($validator->fails()){
            return redirect()->route('edit_panel_user', $id)->withInput()->withErrors($validator);
        }
        $panel_user->name = $request->name;
        $panel_user->email = $request->email;
        $panel_user->save();

        $panel_user->roles()->sync($request->role);
        return redirect()->route('user.list_admin')->with('success', 'User got Roles');
    }
}
