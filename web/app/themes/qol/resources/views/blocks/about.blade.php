<div class="block about-block">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="titles">
          @foreach($data->titles as $title)
            <h5 class="title">{{ $title}}</h5>
          @endforeach
        </div>
        <div class="content">
          {{ $data->content }}
        </div>
      </div>
    </div>
  </div>
</div>