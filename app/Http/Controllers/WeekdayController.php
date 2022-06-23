<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weekday;
use Illuminate\Support\Facades\Validator;

class WeekdayController extends Controller
{
    public function index(Request $request) {
        $weekdays = Weekday::all();
        return response()->json($weekdays);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'weekday_name' => 'required|string|max:255',
            'foods' => 'required|array'
        ]);

        if(!$validator->fails()) {
            $weekday = Weekday::create([
                'weekday_name' => $request->weekday_name
            ]);

            foreach($request->foods as $food_id) {
                $weekday->foods()->attach($food_id);
            }

            $weekday->save();

            return response()->json([
                'success' => 'success'
            ]);
        } else {
            return response()->json([
                'error' => 'error'
            ]);
        }
    }

    public function show($id) {
        $weekday = Weekday::find($id);

        return response()->json([
            'data' => $weekday
        ]);
    }

    public function edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'weekday_name' => 'required|string|max:255',
            'foods' => 'required|array'
        ]);

        if(!$validator->fails()) {
            $weekday = Weekday::find($id);
            $weekday->weekday_name = $request->weekday_name;

            foreach($request->foods as $food_id) {
                $weekday->foods()->attach($food_id);
            }

            $weekday->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $weekday = Weekday::find($id);
        $weekday->delete();
        return response()->json([
            'success' => 'success'
        ]);
    } 
}
