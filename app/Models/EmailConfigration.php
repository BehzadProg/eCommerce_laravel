<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConfigration extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'host',
        'username',
        'password',
        'port',
        'encription',
    ];
}
