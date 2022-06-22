<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weekday as ModelsWeekday;
use Illuminate\Support\Facades\Validator;

class Weekday extends Controller
{
    public function index(Request $request) {
        $weekdays = ModelsWeekday::all();
        return response()->json($weekdays);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'weekday_name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $weekday = ModelsWeekday::create([
                'weekday_name' => $request->weekday_name
            ]);
            $weekday->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'weekday_name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $weekday = ModelsWeekday::find($id);
            $weekday->weekday_name = $request->weekday_name;
            $weekday->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $weekday = ModelsWeekday::find($id);
        $weekday->delete();
        return response()->json([
            'success' => 'success'
        ]);
    } 
}
