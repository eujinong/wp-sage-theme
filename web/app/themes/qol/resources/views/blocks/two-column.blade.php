@php
  $defaultOptions = [
    'reverse' => false
  ];
  if (isset($options)) {
    $options = (object)array_merge($defaultOptions, (array)$options);
  } else {
    $options = (object)$defaultOptions;
  }
@endphp
<div class="block two-column-block @if ($options->reverse) {{ 'column-reverse-block' }} @endif">
  <div class="column-block-item">
    @if (isset($data->featured_image))
      <div class="featured-image"
        style="background-image: url('{{ $data->featured_image }}')"
      >
      </div>
    @endif
  </div>
  <div class="column-block-item">    
    <div class="info">
      <h1 class="title">{{ $data->title }}</h1>
      @if (isset($data->subtitle))
        <div class="subtitle">{{ $data->subtitle }}</div>
      @endif
      <div class="content">{!! $data->content !!}</div>
      @if (isset($data->action_link))
        <a class="arrow-link action" href="{{ $data->action_link}}">
          {{ $data->action_title }}
        </a>
      @endif
    </div>
  </div>
</div>