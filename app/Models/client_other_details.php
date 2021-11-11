<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_other_details extends Model
{
    use HasFactory;
    protected $table = "client_other_contact_details";
    protected $fillable = ['client_id', 'client_full_name', 'client_contact_email', 'client_designation', 'client_dep', 'client_cell', 'client_other_contact', 'client_add_1', 'client_add_2', 'client_city', 'other_info_about_client'];
}
