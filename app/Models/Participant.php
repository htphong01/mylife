<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'participants';
    protected $fillable = [
        'user_id',
        'nickname',
        'room_id'
    ];
}
