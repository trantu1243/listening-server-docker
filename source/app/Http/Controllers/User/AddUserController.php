<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function show(){
        $squads = Squad::all();
        return view('user.add-user', [
            'squads' => $squads
        ]);
    }

    public function create(CreateUserRequest $request){
        if ($request->input('role') == '1' && $request->input('squad_id')){
            toastr()->error('Đội trưởng không thể thêm vào đội nào');
            return back();
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => intval($request -> input('role')),
        ]);

        if ($request->has('squad_id')) {
            $user->squad_id = $request->input('squad_id');
            $user->save();
        }
        toastr()->success('Tạo cảnh sát thành công');
        return redirect(route('show-user'));
    }
}
