<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\Tourtype;

class TourTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Tourtype::latest()->paginate(8);
        // $guides = Tourtype::all()->count();
        return view('admin.tourtype.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tourtype.create');
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
            'name' => 'required|unique:tourtypes'
        ]);
    
        $types = new Tourtype();
        $types->name = $request->name;
        $types->save();
   
        return redirect(route('admin.tourtype.index'))->with('success', 'Tour Type inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourtype $tourtype)
    {
       return view('admin.tourtype.edit',compact('tourtype'));
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
        $types=Tourtype::find($id);
        $this->validate($request,[
            'name' => 'required|unique:tourtypes,name,'.$types->id,
            ]);
    
      
        $types->name = $request->name;
        $types->save();

         return redirect(route('admin.tourtype.index'))->with('success', 'Tour Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourtype $tourtype)
    {

        // if(Guide::where('tourtype_id', $type->id)->count() > 0 ){
        //     session()->flash('danger', 'Place type do not removed, because it has some places');
        //     return redirect()->back();
        // }
        $tourtype->delete();
        return redirect(route('admin.tourtype.index'))->with('success', 'Tour Type Deleted Successfully');
    }
}
