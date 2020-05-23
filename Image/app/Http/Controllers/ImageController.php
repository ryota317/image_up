<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Image;
use App\User;
use Illuminate\Support\Facades\DB;
class ImageController extends Controller
{


  public function image_get(){



  $image1 = Image::paginate(10);
// var_dump($image1[0]->path);exit;
  return  $image1 ;


  }



  private function _validateImageType() {

    $this->_imageType = exif_imagetype($_FILES['image']['tmp_name']);
    switch($this->_imageType) {
      case IMAGETYPE_GIF:
        return 'gif';
      case IMAGETYPE_JPEG:
        return 'jpg';
      case IMAGETYPE_PNG:
        return 'png';
      default:
        // throw new \Exception('PNG/JPEG/GIF only!');
        return 'PNG/JPEG/GIF のみ投稿可能';
    }
  }

    //
    public function image_upload(Request $request){



    if($request->isMethod('POST')){
      //アップされた画像名
      $upload_name = $_FILES['image']['name'];
      
      //パス情報の取得
      $info = pathinfo( $upload_name);
     
      //拡張子が存在するかチェック
      $extensio_exist =  array_key_exists ( 'extension' , $info );
     
      //もし拡張子が存在すれば格納 そうでなければhomeへ飛ばす
    if($extensio_exist ){
              $extensio = $info["extension"];
      }else{
        $images   = $this->image_get();
        return view('/home' , ['not_extension' =>  'PNG/JPEG/GIF のみ投稿可能' ,'imgs' => $images]);
        

      }

      //拡張子がgif,jpeg,gifであるかチェック
      if($extensio  != ('gif' || 'jpeg' || 'gif' || 'JPEG')){
        $images   = $this->image_get();
        return view('/home' , ['not_extension' =>  'PNG/JPEG/GIF のみ投稿可能' ,'imgs' => $images]);
        
      }


//画像を保存してそのパスを返す

//※　画像のサイズが大きいとエラーになる TODO
$path = $request->file('image')->store('public/img');
// Image::create(['path' => basename($path)]);


//画像情報の保存
$image = new Image();
$image->title = $request->title;
$image->contributor = Auth::id();
$image->path = basename($path);
$image->save();
$images   = $this->image_get();

//homeへ返す
return view('/home' , ['success' => '画像のアップロードに成功しました','imgs' => $images]);


    }
      //
      // return view('/test', ['title' => $title,'ans' => $ans] );
    }


    public function image_search(Request $request){

        $search_word = $request->image_search;
      //  $image = new Image();
  
 $images = Image::where('title',  'like', "%{$search_word}%")->paginate(10);
// 

 //データベースにデータが存在するかチェック
//  $exists = \App\User::where('id', 1)->exists();



 if($images->first() == NULL){
//検索ワードで画像がヒットしなかったら
return view('/search_result', ['noHit' => '画像が見つかりませんでした','hitCount' => $images->count(),'search_word' => $search_word]);
 }else {
//検索ワードで画像がヒットした場合
 return view('/search_result' , ['imgs' => $images,'hitCount' => $images->count(),'search_word' => $search_word]);
 }

}


public function image_edit(Request $request){
  $path = $request->path;
  


  $image = DB::table('images')->where('path', $path)->first();
  // $image = Image::where('path',  $path)->get();






  //エラー処理書く??  todo
  //
  //

  if(isset($request->edit)){
    
    return view('/image-edit' , ['img' => $image,'change_title_result'=>'タイトル名を変更しました']);
    
   
  }else{
 
    return view('/image-edit' , ['img' => $image]);
  }
    
   



}




public function image_change_title(Request $request){

$img_id = $request->img_id;
$new_title = $request->new_title;
$image = \App\Image::findOrFail($img_id);

$image->title = $new_title;
$image->save();

// $controller = new UserController;
// // $controller->get_user_info(); 

$return_view =  $this->image_edit($request);


return $return_view;

//  return view('/user-info' , ['change_title_result' => 'タイトル変更しました']);

}

}