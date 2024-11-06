<?php

namespace App\Http\Controllers\Suspect;

use App\Http\Controllers\Controller;
use App\Models\Squad;
use App\Models\Suspect;
use Illuminate\Http\Request;

class EditSuspectController extends Controller
{
    public function show($id){
        $suspect = Suspect::findOrFail($id);
        $squads = Squad::all();
        return view('suspect.edit', [
            'suspect' => $suspect,
            'squads' => $squads
        ]);
    }

    public function edit(Request $request, $id){
        try{
            $suspect = Suspect::findOrFail($id);
            $request->validate([
                'name' => 'required|string',
                'squad_id' => 'required|string'
            ]);

            $suspect->name = $request->input('name');
            $suspect->squad_id = $request->input('squad_id');

            $suspect->save();

            toastr()->success('Chỉnh sửa thành công');
            return back();
        }
        catch (\Exception $e){
            toastr()->error("Error");
            return back();
        }
    }
}
