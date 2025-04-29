<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //This method will show role page
    public function index(){

    }

    //This method will create role page
    public function create(){
        $permissions = Permission::orderBy('name', 'a sc')->get();
       return view('roles.create', compact('permissions'));
    }

    //This method will store role page
    public function store(Request $request  ){

    }
}
