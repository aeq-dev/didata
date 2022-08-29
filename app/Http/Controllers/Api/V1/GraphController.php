<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Graph;
use Illuminate\Http\Response;
use App\Http\Requests\GraphRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\GraphResource;
use App\Models\Relation;

class GraphController extends Controller
{

    public function index()
    {
        return GraphResource::collection(Graph::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphRequest $request)
    {
        $graph = Graph::create($request->validated());
        return response()->json(['Graph created successfully.', new GraphResource($graph)], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $graph = Graph::with('nodes', 'relations')->findOrFail($id);
        if (is_null($graph)) {
            return response()->json('Graph not found', 404);
        }
        return new GraphResource($graph);

        //return response()->json([new GraphResource($grap)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GraphRequest $request, Graph $graph)
    {
        $graph->update($request->validated());
        return response()->json(['Graph updated successfully.', new GraphResource($graph)], Response::HTTP_FOUND);
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return null
     */
    public function destroy(Graph $graph)
    {
        $graph->delete();
        return response()->json('Graph deleted successfully', Response::HTTP_NO_CONTENT);
    }

    public function addNode(Graph $graph)
    {
        $graph->nodes()->create([]);
        return response()->json('Node has been Added to Graph successfully', Response::HTTP_CREATED);
    }

    public function addRelation(Graph $graph)
    {
        $parent = $graph->nodes->random()->id;
        $child = $graph->nodes->random()->id;
        $graph->relations()->create([
            'parent_id' => $parent,
            'child_id' => $child,
        ]);
        return response()->json('Relation has been Added to Graph successfully', Response::HTTP_CREATED);
    }

    public function all(Graph $graph)
    {
        return GraphResource::collection($graph::with('nodes', 'relations')->get());
    }
}
