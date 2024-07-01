<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    protected $fillable = ['fullname', 'email', 'password', 'username'];
    protected $guard = 'admin';
    public $timestamps = false;
    public function companies()
    {
        return $this->hasMany(Company::class, 'admin_id');
    }

    public function jobAdvertisements()
    {
        return $this->hasMany(JobAdvertisement::class, 'admin_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'admin_id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'admin_id');
    }
}

