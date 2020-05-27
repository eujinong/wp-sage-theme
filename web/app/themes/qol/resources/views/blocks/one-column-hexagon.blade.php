<div class="block hexagon-block">
  <div class="container">
    <div class="text-center text-white">
      @if (isset($data->title))
        <h5 class="title text-white">{{ $data->title }}</h5>
      @endif
      <div class="content">
        @if (isset($data->content))
          {!! $data->content !!}
        @endif
      </div>
      {!! do_shortcode('[ninja_form id=3]') !!}
    </div>
  </div>
</div>