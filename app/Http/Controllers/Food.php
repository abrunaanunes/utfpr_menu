<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food as ModelsFood;
use Illuminate\Support\Facades\Validator;

class Food extends Controller
{
    public function index(Request $request) {
        $foods = ModelsFood::all();
        return response()->json($foods);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $food = ModelsFood::create([
                'name' => $request->name,
                'type_id' => $request->type_id
            ]);
            $food->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $food = ModelsFood::find($id);
            $food->name = $request->name;
            $food->type_id = $request->type_id;
            $food->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $food = ModelsFood::find($id);
        $food->delete();
        return response()->json([
            'success' => 'success'
        ]);
    }
}
