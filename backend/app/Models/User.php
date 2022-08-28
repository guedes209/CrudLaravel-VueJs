<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    use HasFactory;   
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'id', 
        'email',
        'cpf',
        'name',
        'phone',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $table = 'user';
}
