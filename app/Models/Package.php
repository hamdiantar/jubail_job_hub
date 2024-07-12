<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $primaryKey = 'package_id';
    protected $fillable = ['admin_id', 'type', 'price', 'period','description', 'is_available'];
    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'package_id');
    }
}
