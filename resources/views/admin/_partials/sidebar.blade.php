<nav class="sidebar">

  <p class="fw-bold px-3 mt-3 mb-0">利用会社マスタ</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>利用会社一覧
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>サンプル管理
      </a>
    </li>
  </ul>


  <p class="fw-bold px-3 mt-3 mb-0">自社情報マスタ</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.company.edit', ['company' => 1 ]) }}">
        <i class="bi bi-caret-right me-1"></i>自社情報管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>支社管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>ユーザー管理
      </a>
    </li>
  </ul>

  <p class="fw-bold px-3 mt-3 mb-0">お知らせマスタ</p>
  <ul class="nav flex-column mb-2">
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.news.index') }}">
        <i class="bi bi-caret-right me-1"></i>お知らせ管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="{{ route('admin.news_category.index') }}">
        <i class="bi bi-caret-right me-1"></i>カテゴリ管理
      </a>
    </li>
    <li class="nav-item ps-2">
      <a class="nav-link" href="">
        <i class="bi bi-caret-right me-1"></i>導入事例
      </a>
    </li>
  </ul>

  <p class="fw-bold px-3 mt-3 mb-0">サンプル</p>
  <ul class="nav flex-column accordion" id="nav_accordion">

    <li class="nav-item ps-2">
      <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#menu_item3" aria-controls="menu_item2" aria-expanded="true" href="#">
        登録情報管理<i class="bi bi-caret-down-fill ms-1"></i>
      </a>
      <ul id="menu_item3" class="submenu collapse accordion-collapse show" data-bs-parent="#nav_accordion">
        <li><a class="nav-link" href="{{ route('admin.company.edit', ['company' => 1 ]) }}"><i class="bi bi-chevron-right me-1"></i>お問い合わせ一覧</a></li>
      </ul>
      <ul id="menu_item3" class="submenu collapse accordion-collapse show" data-bs-parent="#nav_accordion">
        <li><a class="nav-link" href="{{ route('admin.office.index') }}"><i class="bi bi-chevron-right me-1"></i>支社管理</a></li>
      </ul>
      <ul id="menu_item3" class="submenu collapse accordion-collapse show" data-bs-parent="#nav_accordion">
        <li><a class="nav-link" href="{{ route('admin.user.index') }}"><i class="bi bi-chevron-right me-1"></i>ユーザー管理</a></li>
      </ul>
    </li>

{{--    <li class="nav-item ps-2">--}}
{{--      <a class="nav-link" href="#">メニュー1</a>--}}
{{--    </li>--}}

{{--    <li class="nav-item ps-2">--}}
{{--      <a class="nav-link" href="">--}}
{{--        <i class="bi bi-caret-right me-1"></i>自社情報管理--}}
{{--      </a>--}}
{{--    </li>--}}
  </ul>

</nav>
