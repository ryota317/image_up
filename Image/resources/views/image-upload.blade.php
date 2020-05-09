<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>画像のアップロード</h1>
    <form  action="{{ url('test') }}" method="post" enctype="multipart/form-data" id="my_form">
  {{ csrf_field()}}
    タイトル:<input type="text" name="title" value=""><br>
    <input type="file" name="image"  id="my_file"><br>
  <input type="submit" name="" value="送信">
  </form>
  <form action="{{ url()->previous() }}">
  <input type="submit" value="戻る">
  </form>

  </body>
</html>
