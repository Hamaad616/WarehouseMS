<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "vendor";

    protected $fillable = ['id','vend_name', 'vend_email', 'vend_address', 'vend_contact_prsn', 'vend_number'];

}
