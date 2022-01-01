<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = DB::table('users')
            ->join('roles', 'users.roleId', '=', 'roles.id')
            ->select('users.id', 'users.name as name', 'users.email', 'roles.name as roleName')
            ->get();
        return view('User.userView', compact('users'));
    }

    public function getUserByUserId($id)
    {
        $user = DB::table('users')
            ->join('roles', 'users.roleId', '=', 'roles.id')
            ->select('users.id', 'users.name as name', 'users.email', 'roles.name as roleName')
            ->where('users.id', '=', $id)
            ->get();
        return view('User.userDetailsView', compact('user'));
    }

    public function viewUpdateUser($id)
    {
        $user = DB::table('users')
            ->join('roles', 'users.roleId', '=', 'roles.id')
            ->select('users.id', 'users.name as name', 'users.email', 'roles.name as roleName', 'roles.id as roleId')
            ->where('users.id', '=', $id)
            ->get();
        $roles = DB::table('roles')
            ->select('id', 'name')
            ->get();
        foreach ($roles as $role) {
            if ($role->id == $user[0]->roleId) $role->check = 'selected';
            else $role->check = '';
        }
        return view('User.userUpdate', ['updateUser' => $user, 'updateRole' => $roles]);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user = User::where('id', '=', $id)->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'roleId' => $request->roleId
        ]);

        return redirect(route('getUsers'));
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect(route('getUsers'));
    }
}
