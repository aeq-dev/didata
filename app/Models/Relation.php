<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'child_id',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Node::class, 'parent_id');
    }

    public function child(): HasOne
    {
        return $this->hasOne(Node::class, 'child_id');
    }
}
