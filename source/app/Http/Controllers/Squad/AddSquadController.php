<?php

namespace App\Http\Controllers\Squad;

use App\Http\Controllers\Controller;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;

class AddSquadController extends Controller
{
    public function show(){
        $polices = User::where('role', 1)->get();
        return view('squad.add', [
            'polices' => $polices
        ]);
    }

    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'required|string',
                'captain_id' => 'required|string'
            ]);

            $police = User::find($request->input('captain_id'));

            if ($police->role != 1) {
                toastr()->error("Đội trưởng không hợp lệ");
                return back();
            }

            if ($police->squad_id){
                toastr()->error("Đội trưởng đã quản lý 1 đội");
                return back();
            }

            $squad = Squad::create([
                'name' => $request->input('name'),
                'captain_id' => $request->input('captain_id')
            ]);

            $police->squad_id = $squad->id;
            $police->save();

            toastr()->success('Thêm đội thành công');
            return back();
        }
        catch (\Exception $e){
            toastr()->error("Error");
            return redirect(route('show-squad'));
        }
    }
}
