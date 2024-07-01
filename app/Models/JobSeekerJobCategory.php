<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSeekerJobCategory extends Model
{
    protected $table = 'job_seekers_job_categories';
    protected $primaryKey = 'job_seeker_cate_id';
    protected $fillable = ['job_seeker_id', 'job_category_id'];

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
}
