<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('role:view users',only: ['index']),
            new Middleware('role:edit users',only: ['edit']),
//            new Middleware('role:create users',only: ['create']),
//            new Middleware('role:delete users',only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $hasRole = $user->roles->pluck('id');
        return view('users.edit', compact('user', 'roles', 'hasRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $user= User::find($id);
       $validator = Validator::make($request->all(),[
           'name' => 'required',
           'email' => 'required|email|unique:users,email,'.$user->id,
       ]);

        if($validator->fails()){
            return redirect()->route('users.edit',$id)->withErrors($validator)->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
