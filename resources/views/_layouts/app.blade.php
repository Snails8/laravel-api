<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('description')" />
  <title>@yield('title') @if(Route::currentRouteName() != 'top') @endif</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
  <script src="https://kit.fontawesome.com/e913ec5f83.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Alata" rel="stylesheet">
</head>

<body>
<div>
  <nav>
{{--    @include('_components.menu-box')--}}
  </nav>
</div>
{{--@include('_components.header')--}}
<main id="app">@yield('content')</main>

<footer class="footer">
{{--  @include('_components.menu-box')--}}
</footer>

<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>