<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    protected $table = 'companies';
    protected $primaryKey = 'company_id';
    protected $fillable = ['admin_id', 'fullname', 'email', 'password', 'username',
        'company_name', 'industry', 'logo', 'about_company', 'company_size', 'phone_number_1',
        'phone_number_2', 'website_url', 'linkedin_url', 'twitter_url', 'founded_at',
        'joined_at', 'status', 'is_blocked'];
    protected $dates = ['founded_at', 'joined_at'];
    protected $guard = 'company';

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function jobAdvertisements()
    {
        return $this->hasMany(JobAdvertisement::class, 'company_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'company_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'company_id');
    }

    public function getImagePathAttribute(): string
    {
        return $this->attributes['logo'] ? asset('uploads/' . $this->attributes['logo']) : asset('admin/img/profile.png');
    }
}
