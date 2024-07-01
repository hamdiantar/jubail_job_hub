<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = ['sub_id', 'amount', 'date_time', 'status', 'ref_number'];
    protected $dates = ['date_time'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'sub_id');
    }
}
