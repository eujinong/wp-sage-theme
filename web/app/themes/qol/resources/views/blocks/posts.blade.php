<div class="block posts-block">
  <div class="container">
    <div class="row">
      @if (isset($data->posts))
        @foreach($data->posts as $item)
          <div class="col-md-6">
            @include ('blocks.post', [
              'data' => (object)[
                'image' => $item->image,
                'action_link' => $item->action_link,
                'post_title' => $item->post_title,
                'post_date' => $item->post_date,
                'post_type' => $item->post_type,
                'button_link' => $item->button_link
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