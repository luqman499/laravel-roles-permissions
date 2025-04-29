<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //This method will show role page
    public function index(){
        return view('roles.list');

    }

    //This method will create role page
    public function create(){
        $permissions = Permission::orderBy('name', 'asc')->get();
       return view('roles.create',compact('permissions'));
    }

    //This method will store role page
    public function store(Request $request, $role){
        $validator= Validator::make($request->all(),[
            'name'=>'required|unique:roles|min:3',
        ]);
        if($validator->passes()){
            Role::create(['name'=>$request->name]);
            if (!empty($request->permissions)){
                foreach ($request->permissions as $permission){
                    $role->givePermissionTo($permission);
                }
            }
            return redirect()->route('role.index  ')->with('success','Role  created successfully');
        }
        else{
            return redirect()->route('role.create')->withInput()->withErrors($validator);
        }
    }
}
