<div class="block hero-block main-hero-block justify-content-center"
  @if(isset($data->background_image))
    style="background-image: url('{{ $data->background_image }}')"
  @endif
>
  @if (isset($data->feature_image))
    <div class="feature-image">
      <img src={{ $data->feature_image }} />
    </div>
  @endif
</div>