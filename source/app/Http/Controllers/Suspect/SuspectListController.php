<?php

namespace App\Http\Controllers\Suspect;

use App\Http\Controllers\Controller;
use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuspectListController extends Controller
{
    public function show(Request $request){
        $user = Auth::user();
        $query = Suspect::query();
        if ($user->role !== 0) {
            $query->where('squad_id', $user->squad_id);
        }
        $name = '';
        if ($request->input('name')){
            $name = $request->input('name');
            $query->where('name', 'like', "%" . $name . "%");
        }

        $suspects = $query->paginate(20);
        return view("suspect.index", [
            'suspects' => $suspects,
            'name' => $name
        ]);
    }

    public function destroy($id){
        $suspect = Suspect::find($id);
        $name = $suspect->name;
        $suspect->delete();
        toastr()->success("Xóa đối tượng {$name} thành công");
        return back();
    }
}
