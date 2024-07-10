<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'application_id';
    protected $fillable = ['job_id', 'job_seeker_id', 'application_date', 'interview_date'];
    protected $dates = ['application_date', 'interview_date'];
    public $timestamps = false;
    public function job()
    {
        return $this->belongsTo(JobAdvertisement::class, 'job_id');
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }

    public function applicationStatuses()
    {
        return $this->hasMany(ApplicationStatus::class, 'application_id');
    }
}
