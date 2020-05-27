<div class="block resource-detail-block">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="pdf-image">
          <img src={{ $data->image }} />
        </div>
        <div class="description">
          {!! $data->description !!}
        </div>
      </div>
      <div class="col-lg-4">
        @include ('blocks.file-info')
      </div>
    </div>
  </div>
</div>