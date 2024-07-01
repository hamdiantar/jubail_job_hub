<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAlert extends Model
{
    protected $table = 'job_alerts';
    protected $primaryKey = 'job_alert_id';
    protected $fillable = ['job_seeker_id', 'job_id', 'notification_date', 'notification_time', 'is_read'];
    protected $dates = ['notification_date'];
    protected $casts = [
        'notification_time' => 'datetime:H:i',
    ];

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }

    public function job()
    {
        return $this->belongsTo(JobAdvertisement::class, 'job_id');
    }
}
