<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Placetype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(8);
        return view('admin.banner.index',compact('banners'));
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
        return view('admin.banner.create',compact('districts', 'placetypes'));
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
            'title' => 'required',
            'sub_heading' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('banner')) {
                Storage::disk('public')->makeDirectory('place');
            }

            Storage::disk('public')->putFileAs('banner', $image, name: $imageName);
  
        }else{
                $imageName = "default.png";
        }
  
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->sub_heading = $request->sub_heading;
        $banner->image = $imageName;
        $banner->isActive = true;
        $banner->save();

    return redirect(route('admin.banner.index'))->with('success', 'Guide Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
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
        $banner = Banner::findOrFail($id);
       
        $this->validate($request,[
            'title' => 'required',
            'sub_heading' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|sometimes',
        ]);

      
        $image = $request->file('image');
        if (isset($image)) {
        
            $currentDate = Carbon::now()->toDateString();
                $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
                if (!Storage::disk('public')->exists('banner')) {
                    Storage::disk('public')->makeDirectory('banner');
                }
        
                if(Storage::disk('public')->exists('banner/'.$banner->image)){
                    Storage::disk('public')->delete('banner/'.$banner->image);
                }
        
                Storage::disk('public')->putFileAs('banner', $image, $imageName);
        
        }else{
            $imageName = basename($banner->image);
        }

        $banner->title = $request->title;
        $banner->sub_heading = $request->sub_heading;
        $banner->image = $imageName;
        $banner->isActive = true;
        $banner->save();

        return redirect(route('admin.banner.index'))->with('success', 'Banner Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
    
        $banner->delete();
        return redirect(route('admin.banner.index'))->with('success', 'Place Information deleted Successfully');
    }
}
