<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
	protected $fillable = [
        'task_title', 'description', 'user_id'
    ];
    use HasFactory;
}
