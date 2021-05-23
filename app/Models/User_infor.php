<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_infor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'user_infors';
    protected $fillable = [
        'user_id',
        'dateOfBirth',
        'gender',
        'address',
        'education',
        'work',
        'phoneNumber',
        'relationship'
    ];
}
