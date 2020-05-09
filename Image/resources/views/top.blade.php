
 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <title>画像アップロード</title>
     <style>
       body{
         text-align:center;
         font-family:Arial,sans-serif;
       }
       ul{
         list-style:none;
       }


       input[type=file]{
         position: absolute;
         top:0;
         left:0;
         width: 100%;
         height:100%;
         cursor: pointer;
         opacity: 0;
       }

       .btn{
         position: relative;
         display: inline-block;
         width:300px;
         padding: 7px;
         border-radius: 5px;
         color: #fff;
         background: #00aaff;
         box-shadow: 0 4px #0088cc;
         margin: 10px auto 20px;
       }

       .btn:hover{
opacity: 0.8;
       }


       .msg{
         width:400px;
         font-weight: bold;
       }

       .dummy-img{
         width:200px;
         height:200px;
         background: skyblue;
         margin-right:5px;
         margin-top:5px;
       }

       .boxContainer{
  display: flex;
   flex-wrap: wrap;
}
     </style>
   </head>
   <body>
     @if (Route::has('login'))
         <div class="top-right links">
             @auth
                 <a href="{{ url('/home') }}">Home</a>
             @else
                 <a href="{{ route('login') }}">Login</a>

                 @if (Route::has('register'))
                     <a href="{{ route('register') }}">Register</a>
                 @endif
             @endauth
         </div>
     @endif



     <div class="boxContainer">
<div  class="dummy-img">

</div>
<div  class="dummy-img">

</div>
<div  class="dummy-img">

</div>
<div  class="dummy-img">

</div>
<div  class="dummy-img">

</div>

</div>

   </body>
 </html>
