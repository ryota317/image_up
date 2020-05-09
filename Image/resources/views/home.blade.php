@extends('layouts.app')

@section('content')
<div class="container">
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

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div>
  <form class="" action="{{ url('/image-upload') }}" method="get">
    <input type="submit" name="" value="">画像投稿
  </form>

</div>

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
<form class="" action="{{ route('logout') }}" method="post">
@csrf
<input type="submit" name="" value="ログアウトs" class="logout-button">
</form>

@endsection
