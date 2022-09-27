<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable =  [
        'id',
        'title',
        'article_details',
        'image',
        'status',
        'created_at',
        'updated_at'
    ] ;
    public function getCreatedAtAttribute($date)
{
      return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
}

public function getUpdatedAtAttribute($date)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
}

    protected $appends = ['image_path'];
    
    protected $hidden = [
        
    ];


    public function getimagePathAttribute(){
        if($this->image){
        
           return asset('dashboard/uploads/articles/'.$this->image);
        } 
    
        else
            return asset('dashboard/uploads/placeholder1.png');
    } 
    
    public function getActive()
    {

        return $this->status == 1 ? 'مفعل'  : 'غير مفعل';
    }

}
