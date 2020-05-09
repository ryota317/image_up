@extends('layouts.app')

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      .imgs{
        width:250px;
        height:250px;
      }

.img-box{


  width:250px;
  height:400px;
background: #f0f0f0;
margin-bottom:20px;
margin-right:10px;

}
      .boxContainer{
 display: flex;
  flex-wrap: wrap;
}

.logout-button{
width:100px;
  height:40px;
  border-radius: 20px;
   box-shadow: 3px 3px 3px gray;
}
    </style>
  </head>
  <body>
 
  
    テスト表示ページ
<form class="" action="index.html" method="get">
  画像検索<input type="text" name="" value="">
<input type="submit" name="" value="検索">
</form>
<form class="" action="{{ route('logout') }}" method="post">
@csrf
<input type="submit" name="" value="ログアウト" class="logout-button">
</form>


  <h1 style="color:red"> @isset($title )
{{ $title }}
@endisset
 </h1>
@isset($ans  )
{{ $ans  }}
@endisset

@isset( $success  )
<h1> {{ $success }}</h1>
@endisset

<!-- @isset( $imgs  ) -->
<div class="boxContainer">
@foreach ($imgs as $img)

<div class="img-box">
 <a href=" {{ asset('storage/img/' . $img->path) }}">


<img src=" {{ asset('storage/img/' . $img->path) }}" class="imgs">
</a>
@isset( $img->title  )

 <p>タイトル::　　{{ $img->title }}</p>
@endisset
@isset( $img->contributor )

 投稿者::　　{{ $img->contributor }}
@endisset
</div>

 @endforeach
<!-- @endisset -->

</div>




  </body>
</html>
