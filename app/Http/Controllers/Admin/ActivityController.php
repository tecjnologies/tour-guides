<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = Activity::latest()->paginate(8);
         return view('admin.activity.index',compact('activites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity.create');
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
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'isActive' => 'required|sometimes',
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('activity')) {
                Storage::disk('public')->makeDirectory('activity');
            }

            Storage::disk('public')->putFileAs('activity', $image, name: $imageName);
  
        }else{
                $imageName = "default.png";
        }
  
        $activity = new Activity();
        $activity->title = $request->title;
        $activity->image = $imageName;
        $activity->isActive = $request->isActive;
        $activity->save();

    return redirect(route('admin.activity.index'))->with('success', 'Activity created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('admin.activity.show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('admin.activity.edit',compact('activity'));
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
        $activity = Activity::findOrFail($id);
       
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg|sometimes',
            'isActive' => 'boolean',
        ]);

      
        $image = $request->file('image');
        if (isset($image)) {
        
            $currentDate = Carbon::now()->toDateString();
                $imageName =$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
                if (!Storage::disk('public')->exists('activity')) {
                    Storage::disk('public')->makeDirectory('activity');
                }
        
                if(Storage::disk('public')->exists('activity/'.$activity->image)){
                    Storage::disk('public')->delete('activity/'.$activity->image);
                }
        
                Storage::disk('public')->putFileAs('activity', $image, $imageName);
        
        }else{
            $imageName = basename($activity->image);
        }

        $activity->title = $request->title;
        $activity->image = $imageName;
        $activity->isActive = $request->isActive ?? 0;
        $activity->save();

        return redirect(route('admin.activity.index'))->with('success', 'Activity Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
    
        $activity->delete();
        return redirect(route('admin.activity.index'))->with('success', 'Activity deleted successfully');
    }
}
