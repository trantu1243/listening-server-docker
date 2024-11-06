<?php

namespace App\Http\Controllers\Suspect;

use App\Http\Controllers\Controller;
use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeyloggerSuspectController extends Controller
{
    public function show($id){

        $suspect = Suspect::find($id);

        $user = Auth::user();

        if ($user->role !== 0 && $user->squad_id !== $suspect->squad_id) {
            toastr()->error('Không đủ quyền truy cập');
            return back();
        }

        return view('suspect.keylogger', [
            'suspect' => $suspect
        ]);
    }
}
