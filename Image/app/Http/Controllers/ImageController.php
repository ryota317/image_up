<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class ImageController extends Controller
{


  public function image_get(){



  $image1 = Image::all();
// var_dump($image1[0]->path);exit;
  return  $image1 ;


  }





    //
    public function image_upload(Request $request){


    if($request->isMethod('POST')){
$path = $request->file('image')->store('public/img');
// Image::create(['path' => basename($path)]);




$image = new Image();
$image->title = $request->title;
$image->contributor = 1;
$image->path = basename($path);
$image->save();
$images   = $this->image_get();

return view('/home' , ['success' => '画像のアップロードに成功しました','imgs' => $images]);


    }
      //
      // return view('/test', ['title' => $title,'ans' => $ans] );
    }



}
