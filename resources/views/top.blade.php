@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
  <div class="top">
    <h2>サンプル トップページ</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('images/bootstrap-social.png') }}" class="d-block img-fluid w-100" alt="sample1">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/bootstrap-social.png') }}" class="d-block img-fluid w-100" alt="sample2">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/bootstrap-social.png') }}" class="d-block img-fluid w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>

    {{--  機能/特徴   --}}
    <div class="container pt-5">
      <h2 class="text-center py-3">機能</h2>
      <div class="point1 row">
        <div class="col-md-4">
          <div class="card col-md-4" style="width: 18rem;">
            <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card col-md-4" style="width: 18rem;">
            <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card col-md-4" style="width: 18rem;">
            <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="row py-5">
          <div class="col-md-4">
            <div class="card col-md-4" style="width: 18rem;">
              <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card col-md-4" style="width: 18rem;">
              <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card col-md-4" style="width: 18rem;">
              <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center py-4 border-bottom">
        <a class="btn btn-primary" href="#" role="button">詳しく</a>
      </div>
    </div>

    {{--  導入事例  --}}
    <div class="container pt-2">
      <h2 class="text-center py-3">導入事例</h2>
      <div class="point2 row py-5">
        <div class="col-md-4">
          <div class="card col-md-4" style="width: 18rem;">
            <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card col-md-4" style="width: 18rem;">
            <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card col-md-4" style="width: 18rem;">
            <img src="{{asset('images/bootstrap-social.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center py-4 border-bottom">
        <a class="btn btn-primary" href="#" role="button">詳しく</a>
      </div>

      {{--  お知らせ   --}}
      <div class="container">
        <h2 class="text-center py-3">お知らせ</h2>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
      </div>

      {{--  お問い合わせ   --}}
      <div class="container">
        <h2 class="text-center py-3">お問い合わせ</h2>
      </div>
    </div>
  </div>
@endsection