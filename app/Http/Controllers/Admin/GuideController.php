<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Guide;
use Illuminate\Support\Carbon as SupportCarbon;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::latest()->paginate(8);
        $guideCount = Guide::all()->count();
        return view('admin.guide.index',compact('guides', 'guideCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::where('isActive', true)->get();
        $languages = Language::all();
        return view('admin.guide.create',compact('activities','languages') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'nid' => 'required|unique:guides|numeric',
            'email' => 'required|unique:guides|email',
            'contact' => 'required|unique:guides|numeric',
            'address' => 'required',
            'languages' => 'required|sometimes|array',
            'activities' => 'required|array|sometimes',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
        ]);
            
        $image = $request->file('image');
        if (isset($image)) {            
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('guide')) {
                Storage::disk('public')->makeDirectory('guide');
            }
            Storage::disk('public')->putFileAs('guide', $image, $imageName);
        }else{
            $imageName = "default.png";
        }

        $guide = Guide::create([
            'name' => $request->name,
            'nid' => $request->nid,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'price' => $request->price,
            'experience' => $request->experience,
        ]);

        $guide->activities()->sync($request->activities); 
        $guide->guideLanguages()->sync($request->guideLanguages);
    
    return redirect(route('admin.guide.index'))->with('success', 'Guide Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
    
      return view('admin.guide.show',compact('guide'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {

        $guide = Guide::find($guide->id);
        $guide->load('activities', 'guideLanguages');
        $languages = Language::all();
        $activities = Activity::where('isActive' , true)->get();
        return view('admin.guide.edit',compact('guide','languages', 'activities'));

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
        $guide = Guide::find($id);
      
        $validator = $this->validate($request,[
           'name' => 'required',
            'nid' => 'required|numeric',
            'email' => 'required|email', // Corrected here
            'contact' => 'required|numeric',
            'address' => 'required',
            'languages' => 'required|array|sometimes',
            'activities' => 'required|array|sometimes',
        ]);
    
        $image = $request->file('image');
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
    
            if (!Storage::disk('public')->exists('guide')) {
                Storage::disk('public')->makeDirectory('guide');
            }
    
            if(Storage::disk('public')->exists('guide/'.$guide->image)){
                Storage::disk('public')->delete('guide/'.$guide->image);
            }
    
            Storage::disk('public')->putFileAs('guide', $image, $imageName); 
    
        }else{
            $imageName = basename($guide->image);
        }

        $guide->name = $request->name;
        $guide->nid = $request->nid;
        $guide->image = $imageName ;
        $guide->email = $request->email;
        $guide->contact = $request->contact;
        $guide->address = $request->address;
        $guide->price = $request->price;
        $guide->experience = $request->experience;
       
        $guide->save();
      
        $guide->activities()->sync($request->activities);
        $guide->guideLanguages()->sync($request->languages);

        return redirect(route('admin.guide.index'))->with('success', 'Guide Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
         
        // Delete image
        if(Storage::disk('public')->exists('guide/'.$guide->image)){
                Storage::disk('public')->delete('guide/'.$guide->image);
        }

         $guide->delete();

        return redirect(route('admin.guide.index'))->with('success', 'Guide deleted Successfully');
    }
}
