<?php

namespace App\Http\Controllers\User;

use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\Placetype;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\Package;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function index(){
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        $places = Place::latest()->get();
        $packages = Package::latest()->get();
        $guides = Guide::latest()->get();
        return view('user.dashboard', compact('districts', 'placetypes', 'places', 'packages', 'guides'));
    }

    public function getDistrict(){
        $districts = District::latest()->paginate(8);
        $districtcount = District::all()->count();
        return view('user.district.index',compact('districts', 'districtcount'));
    }

    public function getPlaceType(){
        $types = Placetype::latest()->paginate(8);
        $typescount = Placetype::all()->count();
        return view('user.placeType.index',compact('types', 'typescount'));
    }

    public function getPlaces(){
        $places = Place::latest()->paginate(8);
        $placeCount = Place::all()->count();
        return view('user.place.index',compact('places', 'placeCount'));
    }

    public function getPlaceDetails($id){
        $place = Place::find($id);
        return view('user.place.show',compact('place'));
    }


    public function getGuides(){
        $guides = Guide::latest()->paginate(8);
        $guideCount = Guide::all()->count();
        return view('user.guide.index',compact('guides', 'guideCount'));
    }

    public function getGuideDetails($id){
        $guide = Guide::find($id);
        return view('user.guide.show',compact('guide'));
    }


    public function getPackage(){
        $packages = Package::latest()->get();
        return view('user.package.index', compact('packages'));
    }

    public function getPackageDetails($id){
        $package = Package::find($id);
        return view('user.package.show', compact('package'));
    }

    public function showProfile(){
        $user = User::find(Auth::id());
        return view('user.profile.index', compact('user'));
    }

    public function editProfile($id){
        $user = User::find($id);
        return view('user.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'field' => 'required|string',
            'value' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();
    
        // Update the specific field
        $field = $request->input('field');
        $value = $request->input('value');
    
        if (in_array($field, ['name','username', 'email', 'contact', 'date_of_birth','nationality','gender','address'])) {
            $user->$field = $value;
            $user->save();
    
            return response()->json(['success' => 'Profile updated successfully.']);
        }
    
        return response()->json(['error' => 'Invalid field provided.'], 400);
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user(); 
        if ($user) {
            $user->delete();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success', 'Your account has been deleted successfully.');
        }
        return redirect()->back()->with('error', 'Unable to delete account. Please try again.');
    }
    
}
