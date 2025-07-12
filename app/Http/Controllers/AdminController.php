<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminViewDashboard(){
        return view('admin.admin-view');
    }
}
