<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable =  [
        'id',
        'vision_details',
        'objectives_details',
        'Aboutus_details',
        'status',
        'created_at',
        'updated_at'
    ] ;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function scopeSelection($qury){
        return $qury->select('id','vision_details', 'objectives_details','Aboutus_details',);
    }
}    
