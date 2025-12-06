<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(Request $request)
    {

        $users = User::role(['admin', 'staff', 'subadmin', 'accountent'])->whereNull('type')->latest()->get();
        return view('admin.pages.users.index', compact('users'));
    }






    public function store(UserStoreRequest $request)
    {

        $user = new User();
        $user->name     = $request->name;
        $user->phone    = $request->phone;
        $user->address  = $request->address;
        $user->email    = $request->email;
        $user->licence_number    = '--';
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        flash()->success( ucfirst($user->name) . ' created successfully.');
        return redirect()->route('admin.users.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|unique:users,phone,'. $id,
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->licence_number    = '--';
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->roles) {
            $user->syncRoles($request->roles);
        }
        $user->save();
        flash()->success( ucfirst($user->name) . ' updated successfully.');
        return redirect()->route('admin.users.index');
    }





    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('user'));
    }
    public function statusUpdate($id)
    {
        $user = User::findOrFail($id);
        $user->status = ($user->status === '1') ? '0' : '1';
        $user->save();
        if (Auth::id() === $user->id) {
            Auth::logout();
        }
        flash()->success( 'User updated successfully.');
        return redirect()->back();
    }

    public function destroy($type, $id)
    {

        if (!auth()->user()->hasRole('admin')) {
            flash()->warning('You do not have permission to delete a payment.');
            return back();
        }
        $user = User::findOrFail($id);
        $user->avatar && file_exists(public_path($user->avatar)) && unlink(public_path($user->avatar));
        $user->delete();
        flash()->success('User deleted successfully.');
        return redirect()->route('admin.users.index', $type);
    }
    public function logUsingId($id)
    {
        $user = User::findOrFail($id);
        Auth::loginUsingId($user->id);
        return redirect()->route('admin.dashboard');
    }
}
