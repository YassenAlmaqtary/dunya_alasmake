<?php

use App\Models\Languge;
use Illuminate\Support\Facades\App;



function set_Locale($locale)
{
  
   App::setLocale($locale);

}



function get_defoult_langug(){

    return App::getLocale();

}


function uploadImage($folder, $image)
{  
    $image->store('/', $folder);

    $filename = $image->hashName();
    $path ='/dashboard/uploads/'. $folder . '/' . $filename;
   //$image->move(public_path('/dashboard/uploads/'. $folder . '/'),$filename);
    return $filename;
}

function uploadpdf($folder,$pdf){  
   $pdf->store('/',$folder) ;
  $name=$pdf->hashName();;
  $path ='/assets/admin/pdf/'. $folder . '/' . $name; 
   return $path;
}


function uploadMultiImage($folder,$images)
{
  $pathes=[];
   foreach ($images as $index=>$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    $pathes[$index] ='/assets/admin/images/'. $folder . '/' . $filename;
   }
   return $pathes;
}

function removeImage($path){
    
  //if(file_exists(base_path().$path))
  if(file_exists(public_path().$path)){
  //unlink(base_path().$path);
    unlink(public_path().$path);
   
  }
 

}

function removepdf($path){
   //if(file_exists(base_path().$path))
   if(file_exists(public_path().$path))
   //unlink(base_path().$path);
    unlink(public_path().$path);
 
 }

function removeMultiImage($paths){

  
   foreach($paths as $path){
     //if(file_exists(base_path().$path))
    if(file_exists(public_path().$path))
      //unlink(base_path().$path);
       unlink(public_path().$path);
   }
  

}
 
 function get_url_image($value){
   
  return ($value!=null)?asset($value):"";
} 

function get_url_pdf($value){
   
   return ($value!=null)?asset($value):"";
 } 


function nullSercheValueincollect($array,$value){ 

   $statues=true; 
   foreach($array as $val ){ 
     if($val==$value){
     $statues=false;
     break;
     }
   }
   return $statues;
}
  
 function numberInArry($value,$array){
   $status=false;
   if($value==null){
      $status=false;
      return $status;
   }
   foreach($array as $data){
     if($value==$data){
        $status=true;
        return $status;
     }
   }
   return $status;
}


 function FilterDissedNumber($array){
   $data_arry[]=array();
    foreach($array as $index=>$data){
     
       if(numberInArry($data,$data_arry)){
         continue;
       }
         else{ 
         $data_arry[$index]=$data;
         } 
          
    }
    return $data_arry;

 }


 function time_elapsed_string($datetime, $full = false) {
   $now = new DateTime;
   $ago = new DateTime($datetime);
   $diff = $now->diff($ago);

   $diff->w = floor($diff->d / 7);
   $diff->d -= $diff->w * 7;

   $string = array(
       'y' => 'year',
       'm' => 'month',
       'w' => 'week',
       'd' => 'day',
       'h' => 'hour',
       'i' => 'minute',
       's' => 'second',
   );
   foreach ($string as $k => &$v) {
       if ($diff->$k) {
           $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
       } else {
           unset($string[$k]);
       }
   }

   if (!$full) $string = array_slice($string, 0, 1);
   return $string ? implode(', ', $string) . ' ago' : 'just now';
}

