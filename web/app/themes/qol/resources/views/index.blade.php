@extends('layouts.app')

@section('content')
  <div class="container p-5" style="background: #fff;">

    @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
    @endwhile
  </div>
@endsection
