<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
        'title',
        'description',
    ];

    /**
     * The attributes values that defines the types for the user
     *
     * @var array
     */
    public static $types = [
        1 => 'General Queries',
        2 => 'Payment & Billing Queries',
        3 => 'Landing Page',
    ];

    /**
     * Get the status text for the user
     *
     * @return string
     */
    public function getTypeTextAttribute()
    {
        return Faq::$types[$this->type];
    }
}
