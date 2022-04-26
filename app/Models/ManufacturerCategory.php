<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ManufacturerCategory extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'target',
        'logo',
    ];
    protected $casts = [
        'logo' => 'array',
    ];

    public function getLogoUrlAttribute() {
        if ($this->logo && Storage::disk('public')->exists($this->logo['path'])) {
            return Storage::url($this->logo['path']);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF&size=256';
    }

    public function manufacturer() {
        return $this->hasMany(Manufacturer::class, 'category_id', 'id');
    }
}
