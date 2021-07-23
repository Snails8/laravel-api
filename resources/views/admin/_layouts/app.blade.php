<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="robots" content="noindex">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('/css/app_admin.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/app_admin.js') }}" defer></script>
</head>

<body>
<div id="app">
    @include('admin._partials.nav')
    <div class="container-fluid p-0">
        <main role="main" class="main-box">
            <div class="content-box container">
                <h1 class="h4 mb-3 pb-3 border-bottom">@yield('title')</h1>
                @yield('content')
            </div>
        </main>
    </div>
</div>
</body>
</html>

