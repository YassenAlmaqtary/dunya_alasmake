<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',  
        'image',
        'details',
        'price',
        "status",
        'created_at',
        'updated_at'
    ];
    protected $appends = ['image_path'];
    
        protected $hidden = [
            'created_at',
            'updated_at'
        ];
    
        public function getimagePathAttribute(){
            if($this->image){
            
               return asset('dashboard/uploads/cooks/'.$this->image);
            } 
        
            else
                return asset('dashboard/uploads/placeholder1.png');
        } 
}
