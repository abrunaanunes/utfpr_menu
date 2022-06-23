<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index(Request $request) {
        $foods = Food::all();
        return response()->json($foods);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type_id' => 'required|integer'
        ]);

        if(!$validator->fails()) {
            $food = Food::create([
                'name' => $request->name,
                'type_id' => $request->type_id
            ]);
            $food->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function show($id) {
        $food = Food::find($id);

        return response()->json([
            'data' => $food
        ]);
    }

    public function edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type_id' => 'required|integer'
        ]);

        if(!$validator->fails()) {
            $food = Food::find($id);
            $food->name = $request->name;
            $food->type_id = $request->type_id;
            $food->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $food = Food::find($id);
        $food->delete();
        return response()->json([
            'success' => 'success'
        ]);
    }
}
