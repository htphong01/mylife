<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'notifications';
    protected $fillable = [
        'sender_id',
        'content',
        'receiver_id',
        'link',
        'type',
    ];
}
