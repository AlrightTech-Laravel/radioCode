<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'manufacturer',
        'name',
        'description',
    ];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }
    public function brand() {
        return $this->belongsTo(ManufacturerCategory::class, 'radio_code', 'id');
    }
}
