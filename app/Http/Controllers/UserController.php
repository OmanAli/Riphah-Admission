<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function user_index()
    {
        $users = User::whereNotIn('role', [1, 6])->get();
        $roles = Role::whereNotIn('id', [1, 6])->get();
        $campuses = Campus::get();
        foreach ($users as $key => $user) {
            $users[$key]['role_name'] = Role::where('id', $user->role)->pluck('name')->first();
        }
        return view('pages.users.add', compact('users', 'roles', 'campuses'));
    }

    public function user_store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required',
            'campus' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'mobile'   => $request->mobile ?? null,
                'role'     => $request->role,
                'password' => Hash::make('password'),
                'campus_id' => $request->campus,
            ]);
            $role = Role::findById($request->role);
            $user->assignRole($role->name);
            DB::commit();

            return back()->with('message', 'User Added Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong!');
        }
    }
}
