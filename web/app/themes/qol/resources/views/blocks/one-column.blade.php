@php
  $defaultOptions = [
    'no_background' => false
  ];
  if (isset($options)) {
    $options = (object)array_merge($defaultOptions, (array)$options);
  } else {
    $options = (object)$defaultOptions;
  }
@endphp
<div class="block one-column-block @if ($options->no_background) {{ 'no-background-block' }} @endif">
  <div class="sub-container">
    <h1 class="h4 h1-md title">{{ $data->title }}</h1>
    @if (isset($data->subtitle))
      <div class="subtitle">{{ $data->subtitle }}</div>
    @endif
  </div>
  @if (isset($data->services))
    <div class="service-panel">
      <div class="services">
        <div class="row">
          @foreach($data->services as $item)
            <div class="col-md-4">
              <div class="service">
                <div class="service-icon">
                  <i class="icon icon-lg {{ $item->service_icon }}"></i>
                </div>
                <div class="service-title">
                  {{ $item->service_title }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  @endif
  <div class="sub-container">
    @if (isset($data->main_content))
      <div class="content">{!! $data->main_content !!}</div>
    @endif
    @if (isset($data->sub_contents))
      @foreach($data->sub_contents as $item)
        <div class="sub-content">
          <div class="sub-image">
            <img src={{ $item->sub_image }} />
          </div>
          <div>
            <h6 class="sub-title title-underline text-primary">{{ $item->sub_title }}</h6>
            <div class="sub-user">
              {{ $item->sub_user }}
            </div>
          </div>
        </div>
      @endforeach
    @endif
    @if (isset($data->bottom_content))
      <div class="content">
        {!! $data->bottom_content !!}
      </div>
    @endif
    @if (isset($data->button_link))
      <div class="button-link">
        <a class="btn btn-success" href={{ $data->button_link }} download>
          Download Sizing Chart
        </a>
      </div>
    @endif
    @if (isset($data->action_link))
      <a class="arrow-link text-primary" target="_blank" href="{{ $data->action_link }}">Learn More</a>
    @endif
  </div>
</div>