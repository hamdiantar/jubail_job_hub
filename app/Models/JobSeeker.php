<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class JobSeeker extends Authenticatable
{
    protected $table = 'job_seekers';
    protected $primaryKey = 'job_seeker_id';
    protected $fillable = ['fullname', 'email', 'password', 'username', 'phone_number', 'experience_level', 'address', 'cv', 'joined_at', 'is_blocked'];
    protected $dates = ['joined_at'];
    protected $guard = 'jobseeker';
    public $timestamps = false;

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_seeker_id');
    }

    public function jobAlerts()
    {
        return $this->hasMany(JobAlert::class, 'job_seeker_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'job_seeker_id');
    }

    public function jobSeekerJobCategories()
    {
        return $this->belongsToMany(JobCategory::class, 'job_seekers_job_categories',
            'job_seeker_id' ,'job_category_id');
    }
}
