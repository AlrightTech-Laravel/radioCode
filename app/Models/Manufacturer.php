<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Manufacturer extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'logo',
        'image',
        'price',
        'delivery_time',
        'status',
        'required_fields',
        'description',
        'category_id',
        'popular',
        'linked',
        'target',
        'how_it_works',
        'is_free_radio',
        'hours',
        'sample_serials',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'logo' => 'array',
        'image' => 'array',
        'required_fields' => 'array',
    ];

    /**
     * The attributes values that defines the statuses for the user
     *
     * @var array
     */
    public static $statuses = [
        1 => 'draft',
        2 => 'active',
    ];

    /**
     * The required fields an order
     *
     * @var array
     */
    public static $requiredFields = [
        'device_number' => 'Device Number',
        'part_number' => 'Part Number',
        'model_number' => 'Model Number',
        'date' => 'Date',
        'security_code' => 'Security Code',
        'vin_number' => 'Vin Number',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted() {
        static::deleted(function ($manufacturer) {
            if ($manufacturer->logo) {
                Storage::disk('public')->delete($manufacturer->logo['path']);
            }
            if ($manufacturer->image) {
                Storage::disk('public')->delete($manufacturer->image['path']);
            }
        });
    }

    /**
     * Get the status text for the manufacturer
     *
     * @return string
     */
    public function getStatusTextAttribute() {
        return Manufacturer::$statuses[$this->status];
    }

    /**
     * Get the logo url
     *
     * @return string
     */
    public function getLogoUrlAttribute() {
        if ($this->logo && Storage::disk('public')->exists($this->logo['path'])) {
            return Storage::url($this->logo['path']);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF&size=256';
    }

    /**
     * Get price of the manufacturer code
     *
     * @return float
     */
    public function getPriceAttribute($price) {
        return number_format((float) ($price / 100), 2, '.', ',');
    }

    /**
     * Set price of the manufacturer code
     *
     * @return float
     */
    public function setPriceAttribute($price) {
        return $this->attributes['price'] = $price * 100;
    }

    /**
     * Set slug of the manufacturer code
     *
     * @return float
     */
    public function setSlugAttribute($slug) {
        return $this->attributes['slug'] = strtolower($slug);
    }

    /**
     * Get the image url
     *
     * @return string
     */
    public function getImageUrlAttribute() {
        if ($this->image && Storage::disk('public')->exists($this->image['path'])) {
            return Storage::url($this->image['path']);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->title) . '&color=7F9CF5&background=EBF4FF&size=256';
    }

    /**
     * The instant radio codes attached to this manufacturer
     */
    public function instant_codes() {
        return $this->hasMany(InstantCode::class, 'manufacturer_id', 'id');
    }

    /**
     * The faq attached to this manufacturer
     */
    public function faqs() {
        return $this->hasMany(Faq::class, 'manufacturer_id', 'id');
    }
    public function serials() {
        return $this->hasMany(Serials::class, 'manufacturer_id', 'id');
    }

    /**
     * The radio code orders attached to this manufacturer
     */
    public function orders() {
        return $this->hasMany(Order::class, 'manufacturer_id', 'id');
    }
    public function brand() {
        return $this->belongsTo(ManufacturerCategory::class, 'category_id', 'id');
    }
    public function manufacturer_category() {
        return $this->belongsTo(Manufacturer::class, 'category_id', 'id');
    }

}
