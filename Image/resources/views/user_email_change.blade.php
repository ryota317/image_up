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

//   function email_check(){
//  let email = document.getElementById(email1).value;
// let confirm_email = document.getElementById(email2).value;

// var message = "ssssss";

// if(email === confirm_email ){
// // return true;
// document.getElementById("message_area").innerHTML = message;
//   }else{
//   //  return false;
//   document.getElementById("message_area").innerHTML = message;
//   }
//   }




</script>
</head>
<body>


@if (session('message'))
  <p class="text-danger mt-3">
    {{ session('message') }}
  </p>
@endif


@if($errors->has('new_email'))

{{  $errors->first('new_email')}}
@endif
<p id="values"></p>
<form action="{{ url('user_email_change') }}" method="post" onsubmit="return check(this)" >
{{ csrf_field() }} 
新しいメールアドレス:<input type="text" name="new_email"  id="email1"><br>
新しいメールアドレス(確認):<input type="text" name="new_email2" id="email2" 
>
<input type="hidden" value="change" name="email_change"><br>
<input type="submit" value="変更" name="alert_check">
</form>
<form  action="{{ url('/user-info') }}" method="get">
<input type="submit" value="戻る" >
</form>



<script>

window.onload = function(){

const email = document.getElementById('email1');
var confirm_email = document.getElementById('email2');

const log = document.getElementById('values');


confirm_email.addEventListener('input', updateValue);
function updateValue(e) {

  if(email.value !==  e.target.value){
    log.textContent = '確認パスワードが一致しません';
    log.style.color = "red";
  }else{
    log.textContent = '確認パスワードが一致しました';
    log.style.color = "green";
  }
  // log.textContent = e.target.value;
}



};
</script>

</body>

</html>