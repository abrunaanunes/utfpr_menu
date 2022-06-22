<?php

namespace App\Http\Controllers;

use App\Models\Type as ModelsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Type extends Controller
{
    public function index(Request $request) {
        $types = ModelsType::all();
        return response()->json($types);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $type = ModelsType::create([
                'name' => $request->name
            ]);
            $type->save();

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
            $type = ModelsType::find($id);
            $type->name = $request->name;
            $type->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $type = ModelsType::find($id);
        $type->delete();
        return response()->json([
            'success' => 'success'
        ]);
    }
}
