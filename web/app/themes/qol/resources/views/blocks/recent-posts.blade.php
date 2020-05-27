<div class="block recent-posts-block">
  <div class="container">
    <h4 class="title text-primary">{{ $data->title }}</h4>
    <div class="row">
      @if (isset($data->resources))
        @foreach($data->resources as $item)
          <div class="col-lg-4 col-md-6">
            @include ('blocks.resource', [
              'data' => (object)[
                'image' => $item->image,
                'action_link' => $item->action_link,
                'content' => $item->content
              ]
            ])      
          </div>
        @endforeach
      @endif
    </div>
  </div>
</div>