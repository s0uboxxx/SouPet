<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\Role;

class UserController extends Controller
{
    public function profile()
    {
        $user = User::find(auth()->user()->id);
        $userStatus = UserStatus::find(auth()->user()->id_status);
        $role = Role::find(auth()->user()->id_role);

        return view('user.profile', compact('user', 'userStatus', 'role'));
    }

    public function changePassword()
    {
        return view('auth.passwords.email');
    }

    public function editProfile()
    {
        $user = User::find(auth()->user()->id);
        $userStatus = UserStatus::find(auth()->user()->id_status);

        return view('user.edit-profile', compact('user', 'userStatus'));
    }

    public function uploadFile($file, $folder)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs($folder, $fileName, 'public');
        return $fileName;
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if ($request->id_status == 4) {
            $user->id_status = 4;
        } else {
            if($request->hasFile('avatar')) {
                if($user->avatar != null) {
                    $oldFilePath = public_path('images/user/' . $user->avatar);
                    if(file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $user->fill([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'dob' => $request->dob,
                    'avatar' => $this->uploadFile($request->file('avatar'), 'images/user'),
                ]);
            } else {
                $user->fill([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'dob' => $request->dob
                ]);
            }
        }

        $user->save();

        return redirect()->route('profile');
    }
}
