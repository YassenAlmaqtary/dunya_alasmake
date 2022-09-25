<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable =  [
        'id',
        'vision',
        'vision_details',
        'objectives',
        'objectives_details',
        'Aboutus',
        'Aboutus_details',
        'created_at',
        'updated_at'
    ] ;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}    
