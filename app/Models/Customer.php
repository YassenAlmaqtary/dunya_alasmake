<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'image',
        'gender',
        'status',
        'birth_date',
        'verify_code',
        'verify_status',
        'lat',
        'log',
        'created_at',
        'updated_at',
        

    ];
   
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
     protected $appends = ['image_path'];

  
    public function getImagePathAttribute(){
        if($this->image!=null)
            return asset('asset/dashboard/uploads/customers/'.$this->image);
        else
            return asset('asset/dashboard/uploads/placeholder1.png');
    }
    public function getGender()
    {

        return $this->gender == 1 ? 'ذكر'  : 'انثى';
    }
}
