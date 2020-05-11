<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>

input{
  border:solid 1px gray;
}

    </style>
  </head>
  <body>
    <h1>画像のアップロード</h1>
    <form  action="{{ url('/home') }}" method="post" enctype="multipart/form-data" id="my_form">
  {{ csrf_field()}}
    タイトル:<input type="text" name="title" value=""><br>
    <input type="file" name="image"  id="my_file" required="required"><br>
  <input type="submit" name="" value="送信">
  </form>
  <form action="{{ url()->previous() }}">
  <input type="submit" value="戻る">
  </form>

  </body>
</html>
