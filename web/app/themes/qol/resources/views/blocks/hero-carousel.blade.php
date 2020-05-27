@php
  $defaultOptions = [
    'display_box' => true
];
  if (isset($options)) {
    $options = (object)array_merge($defaultOptions, (array)$options);
  } else {
    $options = (object)$defaultOptions;
  }
@endphp

<app-hero class="block hero-block @if (isset($options->class)) {{ $options->class }} @endif">
  <div class="hero-slick">
    @foreach($data->galleries as $item)
      <div class="slick-item">
        <div class="featured-image" style="background-image: url('{{ $item->featured_image }}')">
        </div>
        @if (isset($item->action_link))
          <script data-item="post-info" type="text/html">
            <h2 class="title">{{ $item->title }}</h2>
            <div class="content">{!! $item->content !!}</div>
            <a class="arrow-link text-white" href="{{ $item->action_link }}">{{ $item->action_title }}</a>
          </script>
        @else
          <script data-item="post-info" type="text/html">
            <h2 class="title">{{ $item->title }}</h2>
            <div class="content">{{ $item->content}}</div>
          </script>
        @endif
      </div>
    @endforeach
  </div>
  @if ($options->display_box)
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-8 col-12">
          <div class="hero-box">
            <div class="post-navigation">
            </div>
            <div class="post-info">
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
</app-hero>