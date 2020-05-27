<a @if($data->type === 'pdf')href="{{ $data->action_link }}"@endif class="w-100 text-decoration-none" @if($data->type === 'pdf')target="_blank"@endif>
  <app-resource class="card card-resource">
    <div class="post-header">
      <div
        data-width="960"
        data-height="@if($data->type === 'video') 540 @else 960 @endif"
        @if($data->type === 'video')data-fancybox-video @endif
        data-src={{ $data->action_link }}
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
  </app-resource>
</a>