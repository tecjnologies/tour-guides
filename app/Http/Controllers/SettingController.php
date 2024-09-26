<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return Setting::all();
    }

    public function show($id)
    {
        return Setting::findOrFail($id);
    }

    public function store(Request $request)
    {
        $setting = Setting::create($request->all());
        return response()->json($setting, 201);
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update($request->all());
        return response()->json($setting, 200);
    }

    public function destroy($id)
    {
        Setting::destroy($id);
        return response()->json(null, 204);
    }
}
