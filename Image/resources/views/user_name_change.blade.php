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
<body>
<form action="{{ url('user_name_change') }}" method="post" onsubmit="return check(this)">
{{ csrf_field() }} 
新しいユーザ名:<input type="text" name="new_name" >
<input type="hidden" value="change" name="name_change">
<input type="submit" value="変更" name="alert_check">
</form>
<form action="{{ url()->previous() }}">
  <input type="submit" value="戻る">
  </form>
</body>

</html>