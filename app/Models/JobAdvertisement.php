<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAdvertisement extends Model
{
    protected $table = 'job_advertisements';
    protected $primaryKey = 'job_id';
    protected $fillable = ['company_id', 'admin_id', 'job_title', 'job_description', 'job_type', 'requirements', 'experience_level', 'education_level', 'skills_required', 'salary', 'benefits', 'location', 'working_hours', 'application_deadline', 'posted_date', 'is_published', 'advertise'];
    protected $dates = ['application_deadline', 'posted_date'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function jobAlerts()
    {
        return $this->hasMany(JobAlert::class, 'job_id');
    }

    public function jobAdvertisementCategories()
    {
        return $this->hasMany(JobAdvertisementCategory::class, 'job_id');
    }
}
