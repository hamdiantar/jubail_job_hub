<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'sub_id';
    protected $fillable = ['company_id', 'package_id', 'date_time'];
    protected $dates = ['date_time'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'sub_id');
    }
}
