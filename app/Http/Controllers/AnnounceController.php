<?php

namespace App\Http\Controllers;

use App\Models\Announce;
use Illuminate\Http\Request;
use App\Enums\TagOptionsEnum;
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
        $announce->tag = $request->tag;
        $announce->description = $request->description;

        if($announce->save()) {
            return response()->json([
                'message' => __('success.success'),
            ], 200);
        }

        return response()->json([
            'message' => __('error.error'),
        ], 500);
    }

    public function index() {
        $announcements = Announce::all();

        if($announcements->isNotEmpty()) {
            $announcements->transform(function ($announcement) {
                $images = json_decode($announcement->image_path, true);
                $announcement->images = $images ?? [];
                return $announcement;
            });
    
            return response()->json([
                'message' => __('success.success'),
                'announcements' => $announcements,
            ], 200);
        }

        return response()->json([
            'message' => __('error.error'),
        ], 404);
    }

    public function getTags() {
        $tags = TagOptionsEnum::getValues();

        return response()->json([
            'tags' => $tags,
        ], 200);
    }
}
