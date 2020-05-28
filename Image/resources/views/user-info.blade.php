@extends('layouts.app')

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<style>
.user-name-fild{
  display:flex;
  justify-content: left;
   /* flex-wrap: wrap;  */
   
}
.content{
  width: 200px;
  text-align:center;
  border:solid 1px gray;
  flex: 0 0 auto;
}
</style>
  </head>
  <body>


  
  @isset( $change_msg )
<p> {{ $change_msg }} </p>
@endisset
@isset( $del_msg )
<p> {{ $del_msg }} </p>
@endisset



  ユーザ情報<br>
<div class="user-name-fild">
<div class="item content">
ユーザ名　:　
</div>
<div class="user-name content">
{{ $user->name }}
</div>
<div class="user-name-change content">
<form action="{{ url('/user_name_change') }}" method="get">
<button>ユーザ名変更</button>
</form>
</div>

</div>


<div class="user-name-fild">
<div class="item content">
メールアドレス:
</div>
<div class="user-name content">
{{ $user->email }}
</div>
<div class="user-name-change content">
<form action="{{ url('/user_email_change') }}" method="get">
<button>メールアドレス変更</button>
</form>
</div>


</div>

投稿一覧
(※画像タップでタイルの編集や画像の削除ができます。)




<!-- @isset( $images  ) -->

<div class="boxContainer">
@foreach ($images as $img)

<div class="img-box">
 <!-- <a href=" {{ asset('storage/img/' . $img->path) }}">  -->
  <!-- <a href=" image-info-edit?path={{ asset('storage/img/' . $img->path) }}">   -->

  <form action="{{ url('/image-info-edit') }}" method="get">
  <input type="image" src=" {{ asset('storage/img/' . $img->path) }}" class="imgs"> 
  <input type="hidden" value="{{ $img->path }}" name="path">
  </form>
  

@isset( $img->title  )

 <p>タイトル::　　{{ $img->title }}</p>
@endisset
@isset( $user->name )

 投稿者::　　{{ $user->name }}
@endisset
</div>

 @endforeach




 </div>

 
<!-- @endisset -->

<form action="{{ url('/home') }}" method="get">
  <input type="submit" value="戻る">
  </form>

  </body>
</html>