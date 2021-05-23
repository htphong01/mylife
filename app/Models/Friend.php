<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'friends';
    protected $fillable = [
        'user_id1',
        'user_id2',
        'isAccepted',
    ];
}
