<div class="block products-block">
  <div class="container">
    @foreach ($data->products as $item)
      <div class="product">
        <div class="row">
          <div class="col-lg-5">
            <div class="featured-image">
              <img src="{{ $item->featured_image }}">
            </div>
          </div>
          <div class="offset-lg-1 col-lg-6">
            <h1 class="title">
              {{ $item->title }}
            </h1>
            <div class="content">
              {!! $item->content !!}
            </div>
            @if (isset($item->action_link) && !empty($item->action_link))
              <a class="arrow-link" href="{{ $item->action_link }}">Learn more</a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>