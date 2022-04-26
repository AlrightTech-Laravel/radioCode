<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Order extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'manufacturer_id',
        'name',
        'email',
        'charge_id',
        'method',
        'serial_number',
        'required_fields',
        'price',
        'discount',
        'charged_price',
        'radio_code',
        'payment_status',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'required_fields' => 'array',
    ];

    /**
     * The attributes values that defines the statuses for the order
     *
     * @var array
     */
    public static $statuses = [
        1 => 'pending',
        2 => 'completed',
        3 => 'objection',
        4 => 'canceled',
    ];

    /**
     * The attributes values that defines the payment statuses for the user
     *
     * @var array
     */
    public static $paymentStatuses = [
        1 => 'pending',
        2 => 'completed',
        3 => 'canceled',
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
     * Get the status text for the user
     *
     * @return string
     */
    public function getStatusTextAttribute() {
        return Order::$statuses[$this->status];
    }

    /**
     * Get the payment status text for the user
     *
     * @return string
     */
    public function getPaymentStatusTextAttribute() {
        return Order::$paymentStatuses[$this->payment_status];
    }

    /**
     * Get price of the manufacturer code
     *
     * @return float
     */
    // public function getPriceAttribute($price)
    // {
    //     return number_format((float)($price / 100), 2, '.', ',');
    // }

    /**
     * Set price of the manufacturer code
     *
     * @return float
     */
    // public function setPriceAttribute($price) {
    //     return $this->attributes['price'] = $price * 100;
    // }

    /**
     * Get charged price of the manufacturer code
     *
     * @return float
     */
    public function getChargedPriceAttribute($charged_price) {
        return number_format((float) ($charged_price / 100), 2, '.', ',');
    }

    /**
     * Set charged price of the manufacturer code
     *
     * @return float
     */
    public function setChargedPriceAttribute($charged_price) {
        return $this->attributes['charged_price'] = $charged_price * 100;
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

        return null;
    }

    /**
     * The manufacturer attached to this radio code
     */
    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }

}
