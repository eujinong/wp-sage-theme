<div class="block page-header-block detail-header-block">
  <div class="container">
    <div class="back-action">
      <a href="/blog" class="back-link text-primary">
        <i class="icon icon-chevron-left icon-ts"></i>
        Back to QOL Blog
      </a>
    </div>
    <a href={{ $data->action_link }} class="btn btn-primary border-radius-none">Events</a>
    <h1 class="title">
      {{ $data->title }}
    </h1>
    <div class="post-date">
      <span>{{ $data->post_date }}</span> - <span>{{ $data->post_type }}</span>
    </div>
  </div>
</div>
