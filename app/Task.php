<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'sort',
        'dueDate',
        'deferDate',
        'completedDate',
        'completed',
        'prioritised',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'id',
        'title',
        'description',
        'sort',
        'dueDate',
        'deferDate',
        'completedDate',
        'completed',
        'prioritised',
        'updated_at',
        'created_at'
    ];
}
