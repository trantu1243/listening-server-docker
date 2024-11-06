<?php

namespace App\Http\Controllers\Squad;

use App\Http\Controllers\Controller;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SquadController extends Controller
{
    public function show(){
        $user = Auth::user();
        if ($user->role === 0){
            $squads = Squad::all();
            return view('squad.index', [
                'squads' => $squads
            ]);
        } else if ($user->role === 1) {
            $users = User::where('squad_id', $user->squad_id)->get();
            return view('squad.manage', [
               'users' => $users
            ]);
        }

    }

    public function destroy($id){
        $squad = Squad::findOrFail($id);
        $name = $squad->name;
        $squad->delete();
        toastr()->success("Xóa {$name} thành công");
        return back();
    }

    public function add(Request $request){
        $user = Auth::user();
        if ($user->role === 1){
            $request->validate([
                'email' => 'required|string'
            ]);
            $police = User::where('email', $request->input('email'))->first();
            if ($police->role !== 2) {
                toastr()->error('Không thể thêm');
                return back();
            }
            if ($police->squad_id) {
                toastr()->error('Đã ở trong đội khác');
                return back();
            }
            $police->squad_id = $user->squad_id;
            $police->save();
            toastr()->success('Thêm vào trong đội thành công');
            return back();
        } else {
            toastr()->error('Không đủ quyền truy cập');
            return back();
        }
    }

    public function delete($id){
        $user = Auth::user();
        if ($user->role === 1){
            $police = User::find($id);
            if ($police->role !== 2 ||$police->squad_id !== $user->squad_id) {
                toastr()->error('Không thể xóa');
                return back();
            }

            $police->squad_id = null;
            $police->save();
            toastr()->success("Xóa {$police->name} khỏi đội thành công");
            return back();
        } else {
            toastr()->error('Không đủ quyền truy cập');
            return back();
        }
    }
}
