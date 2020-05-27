<div class="block resources-block">
  <div class="container">
    <div class="row">
      @if (isset($data->resources))
        @foreach($data->resources as $item)
          <div class="col-lg-4 col-md-6">
            @include ('blocks.resource', [
              'data' => (object)[
                'image' => $item->image,
                'action_link' => $item->action_link,
                'action_title' => $item->action_title,
                'title' => $item->title,
                'type' => $item->type
              ]
            ])      
          </div>
        @endforeach
      @endif
    </div>
    <div class="text-center">
      @include ('shared.pagination')
    </div>
  </div>
</div>