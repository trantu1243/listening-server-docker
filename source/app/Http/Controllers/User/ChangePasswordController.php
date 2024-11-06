<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function show($id){
        $user = User::find($id);
        if ($user && $user -> role !== 'ADMIN')
            return view('user.change-password', ['user' => $user]);
        toastr()->error('Error');
        return redirect(route('show-user'));
    }

    public function change($id, ChangePasswordRequest $request){
        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        toastr()->success("Đổi mật khẩu {$user->name} thành công");
        return redirect(route('show-user'));
    }
}
