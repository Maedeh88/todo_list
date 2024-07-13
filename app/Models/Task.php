<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'progress_id',
        'priority_id',
        'subject',
        'description'
    ];
}
