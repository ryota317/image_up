@extends('layouts.app')

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
    'use strict';
{

  function check(){

    if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示
  
      return true; // 「OK」時は送信を実行
  
    }
    else{ // 「キャンセル」時の処理
  
      window.alert('キャンセルされました'); // 警告ダイアログを表示
      return false; // 送信を中止
  
    }
  
  }
</script>
</head>
  
    
    <img src=" {{ asset('storage/img/' . $img->path) }}" alt=""
    width="200" height="200">
    <br>
    {{ $img->title}}
<form action="{{ url('/home')}}"  method="post"  onsubmit="return check()">

<input type="submit" value="削除" id="image-delete" >
</form>



 <script src="{{ asset('/js/form.js') }}"></script>

  </body>
</html>