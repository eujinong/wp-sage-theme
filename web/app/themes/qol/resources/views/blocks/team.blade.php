<div class="block team-block">
  <div class="container">
    <h1 class="title">{{ $data->title }}</h1>
    @if (isset($data->content))
      <div class="content">
        {!! $data->content !!}
      </div>
    @endif
    @if (isset($data->members))
      @foreach($data->members as $item)
        <div class="team-member">
          <div class="member-image" style="background-image: url('{{ $item->image }}')">
          </div>
          <div class="member-info">
            <h6 class="member-name">
              {{ $item->member_name }}
            </h6>
            <div class="member-description">
              {{ $item->member_description }}
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
</div>