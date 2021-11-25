<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requisitions extends Model
{
    use HasFactory;
    protected $table = 'requisition';
    protected $fillable = ['sch_id', 'wh_id', 'po', 'req_created_date_time', 'mode', 'courier', 'dispatch_flag', 'status', 'req_flag', 'req_status', 'delivery_date_time', 'remarks', 'session_id'];
}
