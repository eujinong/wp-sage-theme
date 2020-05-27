<div class="block video-player-block">
  <div class="container">
    <h1 class="title h4 h1-md">
      {{ $data->video_title }}
    </h1>
    <div class="embed-responsive">
      <iframe class="embed-responsive-item" width="100%" height="auto" src="{{ $data->video_link }}"></iframe>
    </div>
  </div>
</div>