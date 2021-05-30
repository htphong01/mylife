<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tasks';
    protected $fillable = [
        'creater_id',
        'receiver_id',
        'room_id',
        'content',
        'deadline',
        'isSubmitted',
        'isCompleted'
    ];
}
