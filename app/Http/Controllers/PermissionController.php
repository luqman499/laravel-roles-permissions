<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //this method will show the permission page
    public function index(){
        return view('permission.list');
    }

    //this method will show the create permission page
    public function create(){
      return view('permission.create');
    }

    //this method will show the  store permission page
    public function store(Request $request){
       $validator= Validator::make($request->all(),[
           'name'=>'required|unique:permissions|min:3',
       ]);
       if($validator->passes()){
           Permission::create(['name'=>$request->name]);
           return redirect()->route('permission.index')->with('success','Permission created successfully');
       }
       else{
           return redirect()->route('permission.create')->withInput()->withErrors($validator);
       }
    }

    //this method will show the edit permission page
    public function edit(){

    }


    //this method will show the update permission page
    public function update(){}
    //this method will show the destroy permission page
    public function destroy(){}
}
