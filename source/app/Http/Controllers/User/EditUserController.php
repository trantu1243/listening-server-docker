<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        $squads = Squad::all();
        return view('user.edit', [
            'user' => $user,
            'squads' => $squads
        ]);
    }

    public function edit(Request $request, $id){
        try{
            $user = User::findOrFail($id);
            $request->validate([
                'name' => 'required|string',
                'role' => 'required|string'
            ]);

            if ($user->role = 1 && $request->input('role') == '2'){
                $squad = Squad::where('captain_id', $user->id)->first();
                $squad->captain_id = null;
                $squad->save();
            }

            $user->name = $request->input('name');
            $user->role = intval($request->input('role'));
            if ($request->input('squad_id')){
                if ($request->input('role') == '1') {
                    toastr()->error('Đội trưởng không thể thêm vào đội nào');
                    return back();
                }
                $user->squad_id = $request->input('squad_id');
            } else {
                $user->squad_id = null;
            }
            $user->save();

            toastr()->success('Chỉnh sửa thành công');
            return back();
        }
        catch (\Exception $e){
            toastr()->error("Error");
            return back();
        }
    }
}
