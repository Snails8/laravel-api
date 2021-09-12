<nav class="navbar-front navbar-expand-lg navbar-dark bg-dark">
  <div class="row container-fluid pe-0">
    <div class="col-md-auto me-auto nav">
      <div class="navbar-brand nav-item">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Act') }}</a>
      </div>
{{--      <a class="nav-item nav-link navbar-menu" href="{{ route('company.index') }}">--}}
        <div>会社情報</div>
{{--      </a>--}}
      <a class="nav-item nav-link navbar-menu" href="{{ route('contact.index') }}">
        <div>お問い合わせ</div>
      </a>
      <a class="nav-item nav-link navbar-menu" href="{{ route('register.form') }}">
        <div>応募フォーム</div>
      </a>
      <a class="nav-item nav-link navbar-menu" href="">
        <div>ログイン</div>
      </a>
    </div>
    <div class="col-md-auto ms-auto">
      <div class="user-info">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDropdown" aria-controls="navDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-row" id="navDropdown">
          <ul class="navbar-nav">

            @if(Auth::guard('member')->check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person me-1"></i>
                  {{ Auth::guard('admin')->user()->name ?? '' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navDropdownMenuLink">
                  <li><a class="dropdown-item text-white" href="#">マイページ</a></li>
                </ul>
              </li>
            @else
              <a class="nav-item nav-link navbar-menu text-white" href="{{ route('register.form') }}">
                <div>ログイン</div>
              </a>

              <a class="nav-item nav-link navbar-menu text-white" href="{{ route('register.form') }}">
                <div>会員登録</div>
              </a>
            @endif

          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
