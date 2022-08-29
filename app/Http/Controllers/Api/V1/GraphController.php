<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GraphResource;
use App\Models\Graph;
use Illuminate\Support\Facades\Validator;

class GraphController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', 'unique:graphs'],
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $graph = Graph::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['Graph created successfully.', new GraphResource($graph)]);
    }
}
