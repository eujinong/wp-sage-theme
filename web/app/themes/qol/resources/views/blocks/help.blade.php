<div class="block help-block" style="background-image: url('{{ $data->image }}')">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="help-content">
          <h1 class="title text-white h4 h1-md">{{ $data->title }}</h1>
          <div class="content text-white">{!! $data->content !!}</div>
          @if (isset($data->action_link))
            <a class="arrow-link text-white" href={{ $data->action_link }}>
              {{ $data->action_title }}
            </a>
          @endif
        </div>
      </div>
      <div class="col-lg-6">
        <div class="inner-image"></div>
      </div>
    </div>
  </div>
</div>