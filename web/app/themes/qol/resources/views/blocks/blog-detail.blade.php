<div class="block blog-detail-block">
  <div class="featured-image" style="background-image: url('{{ $data->featured_image }}')"></div>
  <div class="container">
    <div class="content">
      {!! $data->content !!}
    </div>
    <div class="other-articles">
      <h5 class="title">Other articles</h5>
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
    </div>
  </div>
</div>