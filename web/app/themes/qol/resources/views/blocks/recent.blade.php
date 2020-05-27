<a href="{{ $data->action_link }}" class="w-100 text-decoration-none">
  <div class="card card-resource">
    <div class="post-header">
      <div
        class="post-image"
        style="background-image: url('{{ $data->image }}')"
      >
      </div>
      <button class="btn btn-primary border-radius-none">
        {{ $data->action_title }}
      </button>
    </div>
    <div class="title">
      {!! $data->title !!}
    </div>
  </div>
</a>