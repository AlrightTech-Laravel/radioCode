<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serials extends Model {
    use HasFactory;
    protected $fillable = [
        'regex',
        'regex_partial',
        'serial_number',
        'time',
        'timing_msg',
        'price',
        'required_fields',
        'manufacturer_id',
    ];
    protected $casts = [
        'required_fields' => 'array',
    ];

    public static $requiredFields = [
        'device_number' => 'Device Number',
        'part_number' => 'Part Number',
        'model_number' => 'Model Number',
    ];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }
}
