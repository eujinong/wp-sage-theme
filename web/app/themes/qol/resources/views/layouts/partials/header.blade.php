@php
  use App\Menu;
  $primaryMenuItems = Menu::getByLocation('primary-menu');
@endphp

<div class="site-header">
  <app-navigation class="navigation">
    <div class="navigation-main">
      <a class="navigation-brand" href="{{ home_url('/') }}">
        <img src="{{ App\asset('/dist/media/brands/qql-logo.png' ) }}" title="Queensland Orthotic Lab">
      </a>
      <button class="navigation-toggler">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
    <div class="navigation-collapsible">
      <ul class="navigation-menu">
        @if (!empty($primaryMenuItems))
          @foreach ($primaryMenuItems as $menuItem)
            <li class="@if(isset($menuItem->wpse_children)){{ 'has-submenu' }}@endif">
              <a class="@if($loop->last)btn btn-success navigation-button @else nav-item @endif"
                @if(empty($menuItem->wpse_children))
                  href="{{ $menuItem->url }}"
                @endif
                @if($loop->last) target="_blank" @endif
              >
                {{ $menuItem->title }}
              </a>
              @if (isset($menuItem->wpse_children))
                <ul class="navigation-submenu">
                  @foreach ($menuItem->wpse_children as $submenuItem)
                    <li>
                      <a class="nav-item"
                        href="{{ $submenuItem->url }}"
                      >
                        {{ $submenuItem->title }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  </app-navigation>
</div>
