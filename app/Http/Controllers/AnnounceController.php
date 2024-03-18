<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;
use App\Http\Requests\AddAnnouncementRequest;

class AnnounceController extends Controller
{
    public function store(AddAnnouncementRequest $request) {
        $announce = new Announce();
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('uploads', 'public');
                $imagePaths[] = $imagePath;
            }
        }
        
        $announce->animal = $request->animal;
        $announce->image_path = json_encode($imagePaths);
        $announce->price = $request->price;
        $announce->phone_number = $request->phone_number;

        if($announce->save()) {
            return response()->json([
                'message' => __('success.success'),
            ], 200);
        }

        return response()->json([
            'message' => __('error.error'),
        ], 500);
    }
}
