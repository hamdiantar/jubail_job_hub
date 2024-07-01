<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $table = 'application_status';
    protected $primaryKey = 'application_status_id';
    protected $fillable = ['application_id', 'status', 'notes', 'updated_date'];
    protected $dates = ['updated_date'];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
