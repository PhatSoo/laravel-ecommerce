<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;

class UserController extends Controller
{
    public function listAllClients(){
        return view('dashboard.pages.client-manage', ['clients' => User::where('isAdmin', false)->get()]);
    }

    public function listAllAdmins(){
        return view('dashboard.pages.admin-manage', ['admins' => User::where('isAdmin', true)->get()]);
    }

    public function createAccount(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->isAdmin = $request->isAdmin === "1" ? true : false;
        $user->save();

        return redirect()->route($user->isAdmin ? 'd.user-admin' : 'd.user-client')->with('success', 'Account created successfully!');
    }

    public function updateAccount(Request $request, $id) {
        try {
            $user = User::findOrFail($id);

            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['401' => 'Your current Password is wrong.']);
            }

            $isAdmin = $user->isAdmin;
            $fieldsToUpdate = $request->except('password', 'confirmPassword', 'newPassword');

            if ($user->email !== $request->email) {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|unique:users,email',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }


            if ($request->filled('newPassword')) {
                $validator = Validator::make($request->all(), [
                    'newPassword' => 'required|min:8',
                    'confirmPassword' => 'required|same:newPassword',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $fieldsToUpdate['password'] = Hash::make($request->newPassword);
            }

            $fieldsToUpdate['status'] = $request->has('status');

            $fieldsToUpdate = array_filter($fieldsToUpdate, function ($value) {
                return !is_null($value) && $value !== '';
            });

            $user->fill($fieldsToUpdate);
            $user->save();

            return redirect()->route($isAdmin ? 'd.user-admin' : 'd.user-client')->with('success', 'Account updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['404' => 'Account not found.']);
        }
    }

    public function deleteAccount($id) {
        try {
            $user = User::findOrFail($id);
            $isAdmin = $user->isAdmin;
            $user->delete();

            return redirect()->route($isAdmin ? 'd.user-admin' : 'd.user-client')->with('success', 'Account deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['404' => 'Account not found.']);
        }

    }
}