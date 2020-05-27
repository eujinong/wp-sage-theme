<a href="{{ $data->action_link }}" class="card-link w-100 text-decoration-none" target="_self">
  <div class="card card-post w-100">
    <div class="post-image" style="background-image: url('{{ $data->image }}')">
      <button class="btn btn-primary border-radius-none">
        {{ $data->action_title }}
      </button>
    </div>
    <div class="card-body">
      <div class="post-info">
        <div class="post-title">{{ $data->post_title }}</div>
        <div class="post-date">
          <span>{{ $data->post_date }}</span> - <span>{{ $data->post_type }}</span>
        </div>
      </div>
      <div class="post-more">
        <button href={{ $data->button_link }} class="btn btn-success">View more</button>
      </div>
    </div>
  </div>
</a>