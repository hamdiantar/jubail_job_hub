<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    protected $table = 'job_categories';
    protected $primaryKey = 'job_category_id';
    protected $fillable = ['job_category_name'];
    public $timestamps = false;

    public function jobSeekerJobCategories()
    {
        return $this->hasMany(JobSeekerJobCategory::class, 'job_category_id');
    }

    public function jobAdvertisementCategories()
    {
        return $this->hasMany(JobAdvertisementCategory::class, 'job_category_id');
    }
}
