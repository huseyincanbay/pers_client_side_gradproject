<?php

namespace App\Http\Controllers;

use App\Mail\EventCreated;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EventController extends Controller
{
    public function store(Request $request) {


            $event = Event::create([
                'title' => $request->input('title'),
                'address' => $request->input('address'),
                'note' => $request->input('note'),
                'department_id' => $request->input('department'),
                'longitude' => $request->input('longitude'),
                'latitude' => $request->input('latitude'),
                'created_by' => Auth::user()->id,
            ]);

            $agents = DB::table('agents')->select('email')
                ->where('department_id', $request->input('department'))
                ->where('is_confirmed', 'accepted')
                ->where('is_active', '1')
                ->where('role', '!=', 'admin')
                ->get();

            foreach ($agents as $agent) {
                Mail::to($agent->email)->send(new EventCreated($event));
            }

             return redirect()->back()->with('success', 'Successfully Updated.');

    }
}
