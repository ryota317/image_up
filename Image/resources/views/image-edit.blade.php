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


@isset( $change_title_result  )
<p>{{ $change_title_result }}</p>
 @endisset

  <img src=" {{ asset('storage/img/' . $img->path) }}" alt=""
    width="200" height="200">
    <br>
    現在のタイトル名:{{ $img->title}}
    
  <form  action="{{ url('/image-change-title')}}"   method="post"  onsubmit="return check(this)">
  {{ csrf_field() }} 
    <label >新しいタイトル名:<input type="text" name="new_title"></label>
    <input type="submit" value="変更" name="alert_check">
    <input type="hidden" name="img_id" value="{{ $img->id }}">
    <input type="hidden" name="path" value="{{ $img->path }}">
    <input type="hidden" name="edit" value="edit">
  </form>
  <form action="{{ url('/delete-image')}}"  method="post"  onsubmit="return check(this)">
  {{ csrf_field() }} 
  <input type="hidden" value="{{ $img->id }}"  name="id">
  <input type="hidden" value="del"  name="del">
    <input type="submit" value="削除"  name="alert_check" >
  </form>
  <script src="{{ asset('/js/form.js') }}"></script>
  </body>
</html>