{{-- @if (count($pager) > 1)
  <div class="mb-5">
    <ul class="pagination justify-content-center">
      <li class="page-item {{ $page > 1 ? '' : 'disabled' }}">
        <a href="?{{ http_build_query(['page' => $page - 1]) }}" class="page-link bg-light" aria-label="Previous">
          <span aria-hidden="true" class="icon-sm icon-chevron-left"></span>
        </a>
      </li>
      @foreach($pager as $item)
        <li class="page-item {{ $item->active ? 'active' : '' }}"><a href="{{ $item->url }}" class="page-link text-info">{{ $item->page }}</a></li>
      @endforeach
      <li class="page-item {{ $page + 1 > $total ? 'disabled' : '' }}">
        <a href="?{{ http_build_query(['page' => $page + 1]) }}" class="page-link bg-light" aria-label="Next">
          <span aria-hidden="true" class="icon-sm icon-chevron-right"></span>
        </a>
      </li>
    </ul>
  </div>
@endif --}}
@if($posts)
  {{-- <div>
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a href="?" class="page-link bg-light" aria-label="Previous">
          <i aria-hidden="true" class="icon icon-ts icon-chevron-left"></i>
        </a>
      </li>
      <li class="page-item page-number text-center">
        <span>1/1</span>
      </li>
      <li class="page-item ">
        <a href="?page=2" class="page-link bg-light" aria-label="Next">
          <i aria-hidden="true" class="icon icon-ts icon-chevron-right"></i>
        </a>
      </li>
    </ul>
  </div> --}}
@endif