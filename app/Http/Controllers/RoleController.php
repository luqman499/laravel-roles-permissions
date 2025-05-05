<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    //This method will show role page
    public function index(){
        $roles = Role::all();
        return view('roles.list', compact('roles'));

    }

    //This method will create role page
    public function create(){
        $permissions = Permission::orderBy('name', 'asc')->get();
       return view('roles.create',compact('permissions'));
    }

    //This method will store role page
    public function store(Request $request){
        $validator= Validator::make($request->all(),[
            'name'=>'required|unique:roles|min:3',
        ]);

            if ($validator->passes()) {
               $role =  Role::create(['name'=>$request->name]);
                if (!empty($request->permission)) {
                    foreach ($request->permission as $permission) {
                        $role->givePermissionTo($permission);
                    }
                }
                return redirect()->route('roles.index')->with('success','Permission created successfully');
            }
        else{
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }

//    This method with edit the page
    public  function edit($id){
        $role = Role::find($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('roles.edit',compact('role','hasPermissions','permissions'));
    }

    public function update(Request $request,$id){
        $role = Role::find($id);
        $validator= Validator::make($request->all(),[
            'name'=>'required|unique:roles,name,'.$id.',id'
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
               $role->syncPermissions($request->permission);
            }else{
                $role->syncPermissions([]);
            }
            return redirect()->route('roles.index')->with('success','Permission Updated successfully');
        }
        else{
            return redirect()->route('roles.edit',$id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id){
        $roles = Role::find($id);
        $roles->delete();
        return redirect()->route('roles.index')->with('success','Permission Deleted successfully');
    }
}
