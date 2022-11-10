<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function department($id) {
        $department = Department::where('id', $id)->first();
        return view('pages.event', [
            'id' => $id,
            'department' => $department
        ]);
    }

    public function myprofile(){
        return view('pages.my-profile');
    }

    public function events() {
        $events = Event::where('created_by', Auth::user()->id)->paginate(5);;
        return view('pages.history-events', [ 'events' => $events ]);
    }

    public function eventdetails() {
        return view('pages.event-details');
    }


    /*public function update_profile(Request $request, $id){
        //dd($request->all());
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image_name = time().'.'.$request->image->extension();


        $user = User::where('id', $id)->first();
        $user -> name = $request->name();
        $user -> save();
        return redirect('myprofile');
    }*/


    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->update();
        return redirect()->back()->with('status','User Updated Successfully');
    }

}
