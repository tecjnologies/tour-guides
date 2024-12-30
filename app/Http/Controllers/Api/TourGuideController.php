<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\District;
use App\Models\GuideDescription;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class TourGuideController extends Controller
{
    public function index()
    {
        return response()->json(['data' => 'Tour guides retrieved successfully']);
    }

    public function store(Request $request)
    {
        $rules = [
            'nid' => 'required|integer',
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'nationality' => 'required',
            'city' => 'required|string|max:255',
            'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users,email',
                    'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,24}$/'
                ],
            'phone' => ['required', 'regex:/^(009715|\\+9715|5)\d{8}$/'],
            'qualification' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'personal_photo' => 'file|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ];

        $messages = [
            'full_name.required' => 'Full name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.regex' => 'Phone number format is invalid.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validatedData = $validator->validated();

        \DB::beginTransaction();

        try {
            // Handle file upload
            if ($request->hasFile('personal_photo')) {
                $image = $request->file('personal_photo');
                $currentDate = Carbon::now()->toDateString();
                $validatedData['image'] = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('guide')) {
                    Storage::disk('public')->makeDirectory('guide');
                }
                Storage::disk('public')->putFileAs('guide', $image,  $validatedData['image']);
            } else {
                $validatedData['image'] = "default.png";
            }

            $validatedData['name'] = $validatedData['full_name'];
            $validatedData['contact'] = $validatedData['phone'];
            $validatedData['address'] = $validatedData['city'];
            $validatedData['status'] = 1;

            \Log::info($validatedData);
            // Create the guide
            $guide = Guide::create($validatedData);

            // Handle emirates data
            $emirates = District::where('name', $validatedData['city'])->first();
            if ($emirates) {
                GuideDescription::create([
                    'guide_id' => $guide->id,
                    'isCertified' => false,
                    'highRatings' => false,
                    'responsiveGuide' => false,
                    'no_of_slots' => 0,
                    'response_time' => 0,
                    'description' => 'Not Provided',
                    'emirates_id' => $emirates->id
                ]);
            }

            \DB::commit();

            return response()->json([
                'message' => 'Your request has been submitted successfully! You will hear from us soon.',
                'data' => $guide
            ], 200);

        } catch (\Exception $e) {
            \DB::rollBack();

            \Log::error('Error creating guide', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
