<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ApiController extends Controller
{
     public function getAllEvents() {
      // logic to get all students goes here
        $students = Event::get()->toJson(JSON_PRETTY_PRINT);
    return response($students, 200);
    }

    public function createEvents(Request $request) {
    $event = new Event;
    $event->name = $request->name;
    $event->slug = $request->slug;
    $event->save();

    return response()->json([
        "message" => "Event record created"
    ], 201);
  }

    public function getEvent($id) {
    if (Event::where('id', $id)->exists()) {
        $student = Event::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($student, 200);
      } else {
        return response()->json([
          "message" => "Event not found"
        ], 404);
      }
  }

    public function updateEvent(Request $request, $id) {
    if (Event::where('id', $id)->exists()) {
        $event = Event::find($id);
        $event->name = is_null($request->name) ? $event->name : $request->name;
        $event->slug = is_null($request->slug) ? $event->slug : $request->slug;
        $event->save();

        return response()->json([
            "message" => "Event updated successfully"
        ], 200);
        } else {
        return response()->json([
            "message" => "Event not found"
        ], 404);
        
    }
}


     public function deleteStudent ($id) {
      if(Event::where('id', $id)->exists()) {
        $event = Event::find($id);
        $event->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Event not found"
        ], 404);
      }
    }
    
}
