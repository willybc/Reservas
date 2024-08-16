<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function indexAdmin(Request $request) {
        $searchQuery = $request->input('search');
        $roleId = $request->input('user_id');

        $usersQuery = User::with('role');

        if ($searchQuery) {
            $usersQuery->where('name', 'like', '%' . $searchQuery . '%');    
        }

        if ($roleId && $roleId !== 'Todos') {
            $usersQuery->where('role_id', $roleId);
        }

        $users = $usersQuery->get();
        $roles = Role::whereHas('users')->distinct()->get();

        if ($request -> ajax()) {
            return view('admin.users.table', compact('users'))->render();
        }

        return view('admin.users', compact('users', 'roles'));
    }

    public function createAdmin() {
        return view('admin.users.form');
    }

    public function editAdmin($idUser) {
        $user = User::findOrFail($idUser);
        return view('admin.users.form', compact('user'));
    }

    public function store() {

    }

    public function update() {

    }

    public function destroy($idUser) {
        $user = User::findOrFail($idUser);
        $user -> delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
