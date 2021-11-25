<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    use HasFactory;
    protected $table = 'Warehouses';
    protected $fillable = ['wh_code', 'wh_name', 'wh_person', 'wh_email', 'wh_phone', 'wh_address'];
}
