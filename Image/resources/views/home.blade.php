@extends('layouts.app')

 @section('content') 
 <!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif

            
                </div>
            </div> 
        </div>
    </div>
</div> -->


<div class="home-header">
 <form class="" action="#" method="get">
    <input type="submit" name="" value=" {{ Auth::user()->name }}" class="logout-button">
  </form>
<div>
  <form class="" action="{{ url('/image-upload') }}" method="get">
    <input type="submit" name="" value="画像投稿" class="logout-button">
  </form>
</div>

<div>
<form class="" action="{{ route('logout') }}" method="post">
@csrf
<input type="submit" name="" value="ログアウト" class="logout-button">
</form>
</div>
</div>
<div class="search-div">
<form class="" action="index.html" method="get">
  画像検索:<input type="text" name="" value="" class="search-input">
<input type="submit"  value="検索" class="search-button">
</form>
</div>



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
@endsection
