<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::where('role', '!=', 0)->get();
        return view('user.index', ['users' => $users]);
    }

    public function active($id){
        $user = User::findOrFail($id);
        $name = $user->name;
        $user->active = ! $user->active;
        $user->save();
        toastr()->success("Thay đổi trang thái {$name} thành công");
        return back();
    }
}
