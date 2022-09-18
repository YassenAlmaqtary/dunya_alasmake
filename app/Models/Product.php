<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
use HasFactory;
    
protected $fillable = [
    'id',
    'name',  
    'image',
    'details',
    'price',
    'discount_price',
    "statuse",
    'category_id',
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
        
           return asset('dashboard/uploads/products/'.$this->image);
        } 
    
        else
            return asset('dashboard/uploads/placeholder1.png');
    } 
    
    public function getActive()
    {

        return $this->statuse == 1 ? 'مفعل'  : 'غير مفعل';
    }
    
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
      }

}
