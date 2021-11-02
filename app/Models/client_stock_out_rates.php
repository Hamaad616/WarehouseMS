<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_stock_out_rates extends Model
{
    use HasFactory;

    protected $table = "client_stock_out_rates";

    protected $fillable = ['client_id', 'start_order', 'end_order', 'fee'];
}
