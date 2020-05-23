@extends('layouts.app')

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<script>
    function check(frm){

      if(frm.elements["alert_check"].value=="変更"){
        var result = window.confirm('変更してよろしいですか？');
      }else if(frm.elements["alert_check"].value=="削除"){
        var result = window.confirm('削除してよろしいですか？');
     }
     if(result){ 
        return true; 
     }
     else{ 
        return false; 
    }
  }
</script>
</head> 
  <img src=" {{ asset('storage/img/' . $img->path) }}" alt=""
    width="200" height="200">
    <br>
    {{ $img->title}}
  <form  action="#"  method="post"  onsubmit="return check(this)">
    <label >新しいタイトル<input type="text"></label>
    <input type="submit" value="変更" name="alert_check">
  </form>
  <form action="{{ url('/home')}}"  method="post"  onsubmit="return check(this)">
    <input type="submit" value="削除"  name="alert_check" >
  </form>
  <script src="{{ asset('/js/form.js') }}"></script>
  </body>
</html>