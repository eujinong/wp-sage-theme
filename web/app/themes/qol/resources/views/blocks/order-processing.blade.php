<div class="block order-processing-block">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <div class="processing-image">
          <img src="{{ $data->image }}" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="order-processing">
          <h5 class="title text-white">{{ $data->title }}</h5>
          <div class="content text-white">
            {!! $data->content !!}
          </div>
          <div class="actions">
            @if (isset($data->action_link1))
              <a href="{{ $data->action_link1 }}" class="arrow-link text-white">{{ $data->action_title1 }}</a>
            @endif
            @if (isset($data->action_link2))
              <a href="{{ $data->action_link2 }}" class="arrow-link text-white" target="_blank">{{ $data->action_title2 }}</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>