<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guide;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Place;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places =  Place::latest()->get();
        return view('admin.package.create', compact('places'));
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
           'name' => 'required|string|max:255|unique:packages,name', 
            'price' => 'required|numeric|min:0', 
            'day' => 'required|integer|min:1', 
            'people' => 'required|integer|min:1', 
            'package_image' => 'required|mimes:jpeg,png,jpg|max:2048', 
            'description' => 'required|string|max:1000', 
            'places' => 'required|array|min:1', 
            'places.*' => 'string', 
        ]);

       // Get Form Image
      $image = $request->file('package_image');
      if (isset($image)) {

         // Make Unique Name for Image 
        $currentDate = Carbon::now()->toDateString();
        $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


      // Check Category Dir is exists

          if (!Storage::disk('public')->exists('packageImage')) {
             Storage::disk('public')->makeDirectory('packageImage');
          }

           Storage::disk('public')->putFileAs('packageImage', $image, $imageName);

        }

        $package = new Package();
        $package->added_by = Auth::user()->name;
        $package->name = $request->name;
        $package->price = $request->price;
        $package->day = $request->day;
        $package->people = $request->people;
        $package->description = $request->description;
        $package->package_image = $imageName;
        $package->save();;

        $package->places()->attach($request->places);

        return redirect(route('admin.package.index'))->with('success', 'Package Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('admin.package.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {   
        $places =  Place::latest()->get();
        return view('admin.package.edit')->with('package', $package)->with('places', $places);
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
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric|integer',
            'day' => 'required|numeric|integer',
            'people' => 'required|numeric|integer',
            'package_image' => 'mimes:jpeg,png,jpg',
            'description' => 'required',
            'places' => 'required',
        ]);

        $package = Package::findOrFail($id);

        // Get Form Image
        $image = $request->file('package_image');
        if (isset($image)) {

        // Make Unique Name for Image 
        $currentDate = Carbon::now()->toDateString();
        $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


      // Check Category Dir is exists

          if (!Storage::disk('public')->exists('packageImage')) 
          {
             Storage::disk('public')->makeDirectory('packageImage');
          }

          if(Storage::disk('public')->exists('packageImage/'.$package->package_image))
          {
            Storage::disk('public')->delete('packageImage/'.$package->package_image);
          }
          
            Storage::disk('public')->putFileAs('packageImage', $image, $imageName); 
            $package->package_image = $imageName;
        }else{
            $imageName = basename($package->image);
        }

        $package->name = $request->name;
        $package->price = $request->price;
        $package->day = $request->day;
        $package->people = $request->people;
        $package->description = $request->description;
        $package->save();

        $package->places()->sync($request->places);

        return redirect(route('admin.package.index'))->with('success', 'Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        if(Storage::disk('public')->exists('packageImage/'.$package->package_image))
        {
            Storage::disk('public')->delete('packageImage/'.$package->package_image);
        }
        
        $package->places()->detach();
        $package->delete();
        return redirect(route('admin.package.index'))->with('success', 'Package Removed Successfully');
    }
}
