@extends('_layouts.app')
@section('title', $title ?? '')
@section('description', $description ?? '')
@section('content')
  <div>
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
  </div>
@endsection