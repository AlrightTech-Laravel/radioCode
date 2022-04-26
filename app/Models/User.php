<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'created_by_id',
        'fname',
        'lname',
        'email',
        'password',
        'phone',
        'avatar',
        'status',
        'ip_address',
        'last_login_ip',
        'last_login_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'avatar' => 'array',
        'last_login_time' => 'datetime',
    ];

    /**
     * The attributes values that defines the statuses for the user
     *
     * @var array
     */
    public static $statuses = [
        'pending',
        'active',
        'rejected',
        'blocked',
    ];

    /**
     * Get the compound full name of the user
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return trim($this->fname) . " " . trim($this->lname);
    }

    /**
     * Get the initials of the user
     *
     * @return string
     */
    public function getInitialsAttribute()
    {
        return strtoupper(trim($this->fname)[0] . trim($this->lname)[0]);
    }

    /**
     * Get the status text for the user
     *
     * @return string
     */
    public function getStatusTextAttribute()
    {
        return User::$statuses[$this->status];
    }

    /**
     * Get the avatar url
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if($this->avatar && Storage::exists($this->avatar['server_path'])){
            return Storage::url($this->avatar['server_path']);
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF&size=256';
    }

    /**
     * The user model who created the current user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }
}
