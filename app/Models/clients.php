<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    use HasFactory;

    protected $table = "clients";
    protected $fillable = ['sch_id', 'sch_name', 'client_email', 'password', 'ntn_number', 'sales_tax_number', 'legal_type', 'product_in_charge', 'product_out_charge_flat', 'product_out_flat_rate', 'storage_plan', 'minimum_per_month', 'per_item_charge_day', 'per_item_charge_flat', 'flat_per_day', 'per_item_charge_month', 'per_item_charge_day_vol', 'per_item_charge_month_vol', 'flat_per_month', 'volume_cuft', 'volume_flat_rate', 'bulk_space', 'bulk_charge', 'fulfil_plan', 'fl_rate'];

}
