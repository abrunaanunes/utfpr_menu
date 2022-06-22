<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal as ModelsMeal;
use Illuminate\Support\Facades\Validator;

class Meal extends Controller
{
    public function index(Request $request) {
        $meal = ModelsMeal::with(['foods', 'meal'])->all();
        return response()->json($meal);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'weekday_id' => 'required|integer',
        ]);

        if(!$validator->fails()) {
            $meal = ModelsMeal::create([
                'weekday_id' => $request->weekday_id
            ]);
            $meal->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'weekday_id' => 'required|integer',
        ]);

        if(!$validator->fails()) {
            $meal = ModelsMeal::find($id);
            $meal->weekday_id = $request->weekday_id;
            $meal->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $meal = ModelsMeal::find($id);
        $meal->delete();
        return response()->json([
            'success' => 'success'
        ]);
    } 
}
