@php
  use App\Menu;
  $footerMenuItems = Menu::getByLocation('footer-menu');
  $social_links = get_field('social_links', 'option');
  $extra_links = get_field('extra_links', 'option');
@endphp
<div class="site-footer">
  <div class="container">
    <div class="brand-logo">
      <a class="navigation-brand" href="{{ App\url('/') }}">
        <img src="{{ App\asset('/dist/media/brands/qql-logo.png' ) }}" title="Queensland Orthotic Lab">
      </a>
    </div>
    <div class="footer-nav">
      <div class="footer-link">
        <h6><span class="text-white">Call</span> <a href="tel:<?php the_field('call_number', 'option');?>" class="text-success"><?php the_field('call_number', 'option');?></a></h6>
        <div class="social-links">
          @if($social_links)
            @foreach($social_links as $item)
              <a href="{{ $item['social_link'] }}" target="_blank"><img class="icon icon-base mr-2" src="{{ $item['social_icon'] }}" /></a>
            @endforeach
          @endif
        </div>
      </div>
      <ul class="footer-menu">
        @if (!empty($footerMenuItems))
          @foreach ($footerMenuItems as $menuItem)
            <li class="nav-item">
              <a class="nav-link" href="{{ $menuItem->url }}">{{ $menuItem->title }}</a>
            </li>
          @endforeach
        @endif
      </ul>
      <div class="footer-form">
        <h6 class="text-success">
          <?php the_field('form_title', 'option');?>
        </h6>
        <?php the_field('form_content', 'option');?>
        {!! do_shortcode('[ninja_form id=2]') !!}
      </div>
    </div>
    <div class="privacy-terms text-white">
      <?php the_field('copy_right', 'option');?>
      <div class="d-flex">
        @if($extra_links)
          @foreach($extra_links as $item)
            <a href="{{ $item['extra_link'] }}" class="mr-3 text-white">{{ $item['extra_title'] }}</a>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
