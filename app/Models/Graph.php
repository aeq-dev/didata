<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Graph extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function nodes(): HasMany
    {
        return $this->hasMany(Node::class);
    }

    public function relations(): HasMany
    {
        return $this->hasMany(Relation::class);
    }
}
