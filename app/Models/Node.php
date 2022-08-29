<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Node extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'graph_id',
    ];

    public function graph(): BelongsTo
    {
        return $this->belongsTo(Graph::class);
    }
}
