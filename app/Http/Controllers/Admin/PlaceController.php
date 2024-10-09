<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Placetype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->paginate(8);
        $placecount = Place::all()->count();
        return view('admin.place.index',compact('places', 'placecount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        return view('admin.place.create',compact('districts', 'placetypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required|unique:places',
                'district_id' => 'required',
                'placetype_id' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,svg',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'string|max:255',
            ]);
    
            $image = $request->file('image');
            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('place')) {
                 Storage::disk('public')->makeDirectory('place');
                } 
                Storage::disk('public')->putFileAs('place', $image, $imageName);
            }else{
                $imageName = "default.png";
            }

            $place = new Place();
            $place->addedBy = Auth::user()->name;
            $place->name = $request->name;
            $place->district_id = $request->district_id;
            $place->placetype_id = $request->placetype_id;
            $place->description = $request->description;
            $place->tags = is_array($request->tags) ? json_encode($request->tags) : $request->tags;
            $place->image = $imageName;
            $place->save();
           
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $galleryCurrentDate = Carbon::now()->toDateString();
                    $galleryImageName =$galleryCurrentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                    if (!Storage::disk('public')->exists('place')) {
                     Storage::disk('public')->makeDirectory('place');
                    } 
                    Storage::disk('public')->putFileAs('place', $image, $galleryImageName);
                    $place->gallery()->create(['place_id'=>   $place->id,  'image' => $galleryImageName]);
                }
            }
           
            return redirect(route('admin.place.index'))->with('success', 'Guide Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('admin.place.show',compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $districts = District::latest()->get();
        $placetypes = Placetype::latest()->get();
        $place = $place->load('gallery');
        return view('admin.place.edit',compact('place', 'districts', 'placetypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $place = Place::findOrFail($id);
       
        $this->validate($request,[
            'name' => 'required|unique:places,name,'.$place->id,
            'district_id' => 'required',
            'placetype_id' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'description' => 'required',
            'tags' => 'required|array',
            'tags.*' => 'string|max:255',

        ]);

      
        $image = $request->file('image');
        if (isset($image)) {
        
                $currentDate = Carbon::now()->toDateString();
                $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
                if (!Storage::disk('public')->exists('place')) {
                    Storage::disk('public')->makeDirectory('place');
                }
        
                if(Storage::disk('public')->exists('place/'.$place->image)){
                    Storage::disk('public')->delete('place/'.$place->image);
                }
        
                Storage::disk('public')->putFileAs('place', $image, $imageName);
        
        }else{
            $imageName = basename($place->image);
        }

        if ($request->hasFile('images')) {
            
            foreach ($place->gallery as $galleryImage) {
                if(Storage::disk('public')->exists('place/'.$galleryImage->image)){
                    Storage::disk('public')->delete('place/'.$galleryImage->image);
                }
            }

            foreach ($request->file('images') as $image) {
                
                $currentDate = Carbon::now()->toDateString();
                $galleryimageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                $path = $image->store('place', 'public');
                Storage::disk('public')->putFileAs('place', $image, $galleryimageName);
                $place->gallery()->create(['image' => $galleryimageName]);
            }
        }

        $place->name = $request->name;
        $place->district_id = $request->district_id;
        $place->placetype_id = $request->placetype_id;
        $place->description = $request->description;
        $place->tags = is_array($request->tags) ? json_encode($request->tags) : $request->tags;
        $place->image = $imageName;
        $place->save();
        
        return redirect(route('admin.place.index'))->with('success', 'Place Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
    
        $place->delete();
        return redirect(route('admin.place.index'))->with('success', 'Place Information deleted Successfully');
    }
}
