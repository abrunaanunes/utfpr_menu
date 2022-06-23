<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function index(Request $request) {
        $types = Type::all();
        return response()->json($types);
    }

    public function save(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $type = Type::create([
                'name' => $request->name
            ]);
            $type->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function show($id) {
        $type = Type::find($id);

        return response()->json([
            'data' => $type
        ]);
    }

    public function edit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if(!$validator->fails()) {
            $type = Type::find($id);
            $type->name = $request->name;
            $type->save();

            return response()->json([
                'success' => 'success'
            ]);
        }
    }

    public function delete($id) {
        $type = Type::find($id);
        $type->delete();
        return response()->json([
            'success' => 'success'
        ]);
    }
}
