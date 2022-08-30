<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Node;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class NodeController extends Controller
{
    /**
     * Delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        if (!$node)
            return response()->json('Node not found', 404);

        $node->delete();
        return response()->json('Node deleted successfully', Response::HTTP_NO_CONTENT);
    }
}
