<nav class="d-none d-md-block bg-light mt-4 sidebar">
  <div class="sidebar-sticky">
    <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">管理</h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item pl-2">
        <a class="nav-link" href="{{ route('admin.home') }}">
          <span data-feather="chevron-right"></span>
          物件検索
        </a>
      </li>
{{--      loop--}}
    </ul>

    <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">登録</h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item pl-2">
        <a class="nav-link" href="{{ route('admin.home') }}">
          <span data-feather="chevron-right"></span>
          登録
        </a>
      </li>
    </ul>

{{--    @if(Auth::user()->role === 'Master' || Auth::user()->role === 'Standard')--}}
{{--      <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">業者管理</h6>--}}
{{--      <ul class="nav flex-column mb-2">--}}
{{--        <li class="nav-item pl-2">--}}
{{--          <a class="nav-link" href="{{ route('admin.home') }}">--}}
{{--            <span data-feather="chevron-right"></span>--}}
{{--            業者マスタ--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item pl-2">--}}
{{--          <a class="nav-link " href="{{ route('admin.estate_confirm.index') }}">--}}
{{--            <span data-feather="chevron-right"></span>--}}
{{--            物件確認--}}
{{--          </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item pl-2">--}}
{{--          <a class="nav-link" href="{{ route('admin.shop_agent.index') }}">--}}
{{--            <span data-feather="chevron-right"></span>--}}
{{--            物件確認設定<!--（FAX以外）-->--}}
{{--          </a>--}}
{{--        </li>--}}
{{--      </ul>--}}

      <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">HP管理</h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item pl-2">
          <a class="nav-link" href="{{ route('admin.home') }}">
            <span data-feather="chevron-right"></span>
            管理
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading px-3 mt-4 mb-1 text-muted">レポート</h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item pl-2">
          <a class="nav-link" href="{{ route('admin.home') }}">
            <span data-feather="chevron-right"></span>
            登録数確認
          </a>
        </li>
      </ul>
{{--    @endif--}}
  </div>
</nav>
