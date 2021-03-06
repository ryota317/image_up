@extends('layouts.app')

 @section('content') 
 <script src="{{ asset('/modal/modal.js') }}"></script>
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
 <form class="" action="{{ url('/user-info') }}" method="get">
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
<form class="" action="{{ url('search_result') }}" method="get">
  画像検索:<input type="text" name="image_search" value="" class="search-input">
<input type="submit"  value="検索" class="search-button">
</form>
</div>




@isset( $not_extension  )
<h1> {{ $not_extension }} </h1>
@endisset




@isset( $hitCount  )
<h2>検索ワード：{{ $search_word }}</h2>
<h2> <span>{{ $hitCount }}</span>件ヒットしました </h2>
@endisset

@isset( $noHit  )
<h1> {{ $noHit }} </h1>
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
@isset( $img->name )

 投稿者::　　{{ $img->name }}
@endisset
</div>

 @endforeach
 

<!-- @endisset -->

</div>
<div>{{  $imgs->appends(Request::only('find'))->links('vendor.pagination.sample2') }}</div>
@endsection
<div id="mask" class="hidden">

</div>
<section id="modal" class="hidden">


<div id="close">

</div>
</section>