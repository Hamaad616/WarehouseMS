<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = ['id', 'category_name', 'parent_id'];


    public function subcategories(){
        return $this->hasMany('App\Models\categories', 'parent_id');
    }

}
