<?php

namespace App\Http\Controllers\Suspect;

use App\Http\Controllers\Controller;
use App\Models\Suspect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class LocationSuspectController extends Controller
{
    public function show($id){

        $suspect = Suspect::find($id);

        $user = Auth::user();

        if ($user->role !== 0 && $user->squad_id !== $suspect->squad_id) {
            toastr()->error('Không đủ quyền truy cập');
            return back();
        }

        $lines = explode("\n", trim($suspect->location));
        $lines = array_reverse($lines);
        $locations = [];

        foreach ($lines as $line) {
            preg_match('/(.*?) - (\d+\.\d+) (\d+\.\d+)/', $line, $matches);

            if (count($matches) === 4) {
                $locations[] = (object)[
                    'time' => $matches[1],
                    'latitude' => (float)$matches[2],
                    'longitude' => (float)$matches[3]
                ];
            }
        }

        $perPage = 20;
        $currentPage = request()->input('page', 1);
        $collection = collect($locations);
        $paginatedLocations = new LengthAwarePaginator(
            $collection->forPage($currentPage, $perPage),
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('suspect.location', [
            'suspect' => $suspect,
            'locations' => $paginatedLocations,
        ]);
    }
}
