<div class="block approach-block">
  <div class="our-approach">
    <div class="text-center">
      <h1 class="title h4 h1-md text-center">{{ $data->title }}</h1>
      <div class="content">
        {!! $data->content !!}
      </div>
    </div>
    <div class="container">
      <div class="row">
        @if (isset($data->items))
          @foreach($data->items as $item)
            <div class="col-md-4">
              <div class="card card-approach">
                <div class="d-flex align-items-center">
                  <i class="icon {{ $item->icon_name }} icon-md"></i>
                  <div class="approach-title">
                    {{ $item->approach_title }}
                  </div>
                </div>
                <div class="approach-description">
                  {{ $item->approach_description }}
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>