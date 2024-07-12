<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'sub_id';
    protected $fillable = ['company_id', 'package_id', 'date_time'];
    protected $dates = ['date_time'];
    public $timestamps = false;

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


    // Cast date_time to a Carbon instance
    public function getDateTimeAttribute($value)
    {
        return Carbon::parse($value);
    }
}
