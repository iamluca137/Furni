<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserController extends Controller
{
    // List accounts
    public function index()
    {
        // arrage by id desc
        $users = User::orderBy('id', 'desc')->paginate(10);
        $trashes = User::onlyTrashed()->get();
        return view('admin.accounts.list', compact('users', 'trashes'));
    }
    // Add account
    public function create()
    {
        $statuses = UserStatus::all();
        $roles = UserRole::all();
        return view('admin.accounts.add', compact('statuses', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:6|max:20|unique:users',
            'fullname' => 'required|min:6|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:20|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'same:password',
            'phone' => 'required|numeric|regex:/(0)[0-9]{9}/|unique:users',
            'address' => 'required|min:6|max:255',
            'avatar' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalName();
            $filename = time() . "_" . $extention;
            $filename = $this->formatImage($filename);
            $file->move('assets/images/accounts/', $filename);
        } else {
            $filename = "profile.png";
        }

        $dataUsers = [
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $filename,
            'role' => (int)$request->role,
            'status' => (int)$request->status,
        ];

        if (User::create($dataUsers)) {
            return redirect()->route('admin.account')->with('success', 'Account created successfully');
        } else {
            return redirect()->route('admin.account.create')->with('error', 'Failed to create account');
        }
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $statuses = UserStatus::all();
        $roles = UserRole::all();
        return view('admin.accounts.edit', compact('user', 'statuses', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'username' => [
                'required',
                'min:6',
                'max:20',
                Rule::unique('users')->ignore($user->id)
            ],
            'fullname' => 'required|min:6|max:50',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'new_password' => 'nullable|same:new_password_confirmation',
            'new_password_confirmation' => 'nullable|same:new_password',
            'phone' => [
                'required',
                'numeric',
                'regex:/(0)[0-9]{9}/',
                Rule::unique('users')->ignore($user->id)
            ],
            'address' => 'required|min:6|max:255',
            'avatar' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extention = $file->getClientOriginalName();
            $filename = time() . "_" . $extention;
            $filename = $this->formatImage($filename);
            $file->move('assets/images/accounts/', $filename);
            if ($user->avatar != "profile.png") {
                unlink('assets/images/accounts/' . $user->avatar);
            }
        } else {
            $filename = $user->avatar;
        }
        $dataUpdate = [
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->new_password ? Hash::make($request->new_password) : $user->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $filename,
            'role' => (int)$request->role,
            'status' => (int)$request->status,
        ];


        if ($user->update($dataUpdate)) {
            return redirect()->route('admin.account')->with('success', 'Account updated successfully');
        } else {
            return redirect()->route('admin.account.edit', $id)->with('error', 'Failed to update account');
        }
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect()->route('admin.account')->with('success', 'Account deleted successfully');
        } else {
            return redirect()->route('admin.account')->with('error', 'Failed to delete account');
        }
    }

    public function trash()
    {
        $trashes = User::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        return view('admin.accounts.trash', compact('trashes'));
    }

    public function restore(string $id)
    {
        $user = User::onlyTrashed()->find($id);
        if ($user->restore()) {
            return redirect()->route('admin.account.trash')->with('success', 'Account restored successfully');
        } else {
            return redirect()->route('admin.account.trash')->with('error', 'Failed to restore account');
        }
    }

    public function destroy(string $id)
    {
        $user = User::onlyTrashed()->find($id);

        if ($user->forceDelete()) {
            if ($user->avatar != "profile.png") {
                unlink('assets/images/accounts/' . $user->avatar);
            }
            return redirect()->route('admin.account.trash')->with('success', 'Account deleted permanently');
        } else {
            return redirect()->route('admin.account.trash')->with('error', 'Failed to delete account permanently');
        }
    }
}
