<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $fillable = ['task', 'is_done', 'completed_at'];

    protected $casts = [
        'is_done' => 'boolean',
        'completed_at' => 'datetime',
    ];
}
