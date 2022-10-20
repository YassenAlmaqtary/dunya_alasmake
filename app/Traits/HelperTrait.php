<?php
namespace App\Traits;

use Illuminate\Support\Facades\App;

trait HelperTrait {

   public function set_Locale($locale)
{
  
   App::setLocale($locale);

}



public function get_defoult_langug(){

    return App::getLocale();

}


public function uploadImage($folder, $image)
{  
    $image->store('/', $folder);   
    $filename = $image->hashName();
    
    $path ='asset/dashboard/uploads/'. $folder . '/' . $filename;
   
   //$image->move(public_path('/dashboard/uploads/'. $folder . '/'),$filename);
    return $filename;
}

public function uploadpdf($folder,$pdf){  
   $pdf->store('/',$folder) ;
  $name=$pdf->hashName();;
  $path ='/assets/admin/pdf/'. $folder . '/' . $name; 
   return $path;
}


public function uploadMultiImage($folder,$images)
{
  $pathes=[];
   foreach ($images as $index=>$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    $pathes[$index] ='/assets/admin/images/'. $folder . '/' . $filename;
   }
   return $pathes;
}

public function removeImage($path){
   $path='/asset'.$path;
  if(file_exists(base_path().$path)){
  //if(file_exists(public_path().$path)){
   unlink(base_path().$path);
    //unlink(public_path().$path);
   
  }
 

}

public function removepdf($path){
   //if(file_exists(base_path().$path))
   if(file_exists(public_path().$path))
   //unlink(base_path().$path);
    unlink(public_path().$path);
 
 }

 public function removeMultiImage($paths){

  
   foreach($paths as $path){
     //if(file_exists(base_path().$path))
    if(file_exists(public_path().$path))
      //unlink(base_path().$path);
       unlink(public_path().$path);
   }
  

}
 
public function get_url_image($value){
   
  return ($value!=null)?asset($value):"";
} 

public function get_url_pdf($value){
   
   return ($value!=null)?asset($value):"";
 } 


 public function nullSercheValueincollect($array,$value){ 

   $statues=true; 
   foreach($array as $val ){ 
     if($val==$value){
     $statues=false;
     break;
     }
   }
   return $statues;
}
  
//  function numberInArry($value,$array){
//    $status=false;
//    if($value==null){
//       $status=false;
//       return $status;
//    }
//    foreach($array as $data){
//      if($value==$data){
//         $status=true;
//         return $status;
//      }
//    }
//    return $status;
// }


//  function FilterDissedNumber($array){
   
//    $data_arry[]=array();
//     foreach($array as $index=>$data){
     
//        if(numberInArry($data,$data_arry)){
//          continue;
//        }
//          else{ 
//          $data_arry[$index]=$data;
//          } 
          
//     }
//     return $data_arry;

//  }




}