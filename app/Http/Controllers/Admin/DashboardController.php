<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Models\Guide;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Place;
use App\Models\Placetype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function index(){
        \Log::info("inside dashbaord index .....");
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        $places = Place::latest()->get();
        $packages = Package::latest()->get();
        $users = User::where('role_id', 2)->latest()->get();
        $guides = Guide::latest()->get();
        return view('admin.dashboard', compact('districts', 'placetypes', 'places', 'packages', 'users', 'guides'));
    }

    public function showProfile(){
        $user = User::find(Auth::id());
        return view('admin.profile.index', compact('user'));
    }

    public function editProfile($id){
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }


    public function updateProfile(Request $request){
        
        $profile = Auth::id();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email','regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', 'unique:users,email,' . $profile],
            'contact' => ['required','numeric','regex:/^(009715|\\+9715|05)\d{8}$/','unique:users,contact,' . $profile  ],
            'image' => 'mimes:jpeg,png,jpg',
        ]);

        $profile = User::findOrFail($profile);

        $image = $request->file('image');
        if($image)
        {
            
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            if (!Storage::disk('public')->exists('profile_photo')) {
                Storage::disk('public')->makeDirectory('profile_photo');
            }
            
            if(Storage::disk('public')->exists('profile_photo/'.$profile->image)){
                Storage::disk('public')->delete('profile_photo/'.$profile->image);
            }

            Storage::disk('public')->putFileAs('profile_photo', $image, $image_name);
            $profile->image = $image_name;

         }
       
        $profile->name =  $request->name;
        $profile->email =  $request->email;
        $profile->contact =  $request->contact;
        $profile->save();

        session()->flash('success', 'Profile Updated Successfully');
        return redirect(route('admin.profile.show'));
    }
}
