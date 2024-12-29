<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use Validator;
class TourGuideController extends Controller
{
    public function index()
    {
        return response()->json(['data' => 'Tour guides retrieved successfully']);
    }

    public function store(Request $request)
    {
        // Custom error messages for validation
        $messages = [
            'full_name.required' => 'Full name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.regex' => 'Phone number format is invalid.',
        ];

        // Retrieve the JSON data from the request
        $data = $request->json()->all(); // Get all data from the JSON body

        // Validate the data manually
        $validator = Validator::make($data, [
            'nid' => 'required',
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'nationality' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,24}$/'],
            'phone' => ['required', 'regex:/^(009715|\\+9715|5)\d{8}$/'],
            'qualification' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
        ], $messages);

        // If validation fails, return the error response
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity HTTP status
        }

        // Retrieve validated data from the request
        $validatedData = $validator->validated(); // Get validated data

        // Start database transaction
        \DB::beginTransaction();
        try {
            // Handle file upload (if any)
            $personalPhoto = $request->file('personal_photo');
            if ($personalPhoto) {
                $personalPhotoPath = FileHelper::uploadFile($personalPhoto, 'users/photos');
                $validatedData['personal_photo'] = $personalPhotoPath;
            }

            // Set the status field
            $validatedData['name'] = $validatedData['full_name'] ;
            $validatedData['contact'] = $validatedData['phone'] ;
            $validatedData['address'] = $validatedData['city'] ;
            $validatedData['status'] = 1;

            // Create a new Guide instance
            $guide = Guide::create($validatedData);

            // Commit the transaction if successful
            \DB::commit();

            // Return the success response as JSON
            return response()->json([
                'message' => 'Your request has been submitted successfully! You will hear from us soon.',
                'data' => $guide // Return the newly created guide data
            ], 201); // HTTP status code 201 for resource creation

        } catch (\Exception $e) {
            // Rollback the transaction if an error occurs
            \DB::rollBack();

            // Log the error for debugging
            \Log::error('Error creating guide: ' . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            return $e->getMessage();
            // Return error response as JSON
            return response()->json([
                'error' => 'An error occurred while creating the guide. Please try again.'
            ], 500); // HTTP status code 500 for server error
        }
    }


    

}
