<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
    'id',
    'name',
    'icon', 
    'created_at',
    'updated_at'
];
  protected $appends = ['icon_path'];
 
  
    protected $hidden = [
    'created_at',
    'updated_at'
];


public function getIconPathAttribute(){
    if($this->icon){
    
       return asset('asset/dashboard/uploads/categorys/'.$this->icon);
    } 

    else
        return asset('asset/dashboard/uploads/placeholder1.png');
}
public function scopeSelection($qury){
        return $qury->select('id','name');
    }

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
      }    

}


