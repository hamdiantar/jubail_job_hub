<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'review_id';
    protected $fillable = ['admin_id', 'company_id', 'job_seeker_id', 'review_text', 'rating', 'review_date_time'];
    protected $dates = ['review_date_time'];
    public $timestamps = false;
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getDateTimeAttribute()
    {
        return date('Y-m-d H:i A', strtotime($this->review_date_time));
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'job_seeker_id');
    }
}
