<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAdvertisementCategory extends Model
{
    protected $table = 'job_advertisement_categories';
    protected $primaryKey = 'job_ad_cate_id';
    protected $fillable = ['job_id', 'job_category_id'];

    public function job()
    {
        return $this->belongsTo(JobAdvertisement::class, 'job_id');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
}
