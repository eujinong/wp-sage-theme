<div class="card card-file-info">
  <div class="card-body">
    @if (isset($data->file_type))
      <h6>File type</h6>
      <div class="file-info">
        {{ $data->file_type }}
      </div>
    @endif
    @if (isset($data->file_size))
      <h6>File size</h6>
      <div class="file-info">
        {{ $data->file_size }}
      </div>
    @endif
    @if (isset($data->file_type))
      <h6>Last updated</h6>
      <div class="file-info">
        {{ $data->update_date }}
      </div>
    @endif
    @if (isset($data->download_link))
      <a href={{ $data->download_link }} class="btn btn-success">Download</a>
    @endif
  </div>
</div>