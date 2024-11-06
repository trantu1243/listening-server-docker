<?php

namespace App\Http\Controllers\Squad;

use App\Http\Controllers\Controller;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;

class EditSquadController extends Controller
{
    public function show($id){
        $squad = Squad::findOrFail($id);
        $polices = User::where('role', 1)->get();
        return view('squad.edit', [
            'squad' => $squad,
            'polices' => $polices
        ]);
    }

    public function edit(Request $request, $id){
        try{
            $squad = Squad::findOrFail($id);
            $request->validate([
                'name' => 'required|string',
                'captain_id' => 'required|string'
            ]);

            $police = User::find($request->input('captain_id'));

            if ($police->role != 1) {
                toastr()->error("Đội trưởng không hợp lệ");
                return back();
            }

            if ($police->squad_id && $police->id !== $squad->captain_id){
                toastr()->error("Đội trưởng đã quản lý 1 đội");
                return back();
            }

            $squad->name = $request->input('name');
            $squad->captain_id = $request->input('captain_id');
            $squad->save();

            $police->squad_id = $squad->id;
            $police->save();

            toastr()->success('Chỉnh sửa đội thành công');
            return back();
        }
        catch (\Exception $e){
            toastr()->error("Error");
            return back();
        }
    }
}
