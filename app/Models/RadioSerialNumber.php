<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadioSerialNumber extends Model {
    use HasFactory;
    protected $fillable = [
        'serial_number',
        'radio_code',
        'target',
    ];
}
