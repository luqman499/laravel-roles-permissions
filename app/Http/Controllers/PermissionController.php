<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    //this method will show the permission page
    public function index(){
        $permissions = Permission::orderBy('created_at','DESC')->paginate();
        return view('permission.list',['permissions'=>$permissions]);
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
    public function edit($id){
        $permission=Permission::findorFail($id);
        return view('permission.edit',['permission'=>$permission]);

    }


    //this method will show the update permission page
    public function update($id,Request $request){
        $permission=Permission::findorFail($id);
        $validator= Validator::make($request->all(),[
            'name'=>'required|min:3|unique:permissions,name,'.$id.',id'
        ]);
        if($validator->passes()){
//            Permission::create(['name'=>$request->name]);
            $permission->name=$request->name;
            $permission->save();
            return redirect()->route('permission.index')->with('success','Permission Updated successfully');
        }
        else{
            return redirect()->route('permission.edit',$id)->withInput()->withErrors($validator);
        }
    }
    //this method will show the destroy permission page
    public function destroy(Request $request, $id){
        $permission = Permission::find($id);
        $permission->delete();
        session()->flash("success","Permission deleted successfully");
        return back();
    }
}
