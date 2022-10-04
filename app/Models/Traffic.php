<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traffic extends Model
{
    protected $table='traffics';
    use HasFactory;
    
    
    protected $fillable = ['visitor' , 'visits'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($traffic) {
            if ($traffic->visits) {
                $traffic->visits++;
            }
        });
    }


}
