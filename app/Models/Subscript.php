<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subscript extends Model
{
    use HasFactory,Notifiable;

     protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'message',
        'status',
        'created_at',
        'updated_at',
     ];
   

}
