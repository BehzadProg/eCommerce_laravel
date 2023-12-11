<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayIrSetting extends Model
{
    use HasFactory;

    protected $table = "payir_settings";
    protected $guarded = [];
}
