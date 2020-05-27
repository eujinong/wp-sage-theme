@extends('layouts.app')
@section ('content')
  <div class="container">
    <div class="block not-found-block">
      <h1 class="display-1">404</h1>
      <h4>Page Not Found</h4>
      The Page you are looking for doesn't exist or an other error occurred. Go to <a href="{{ App\url('/')}}">Home Page<a>.
    </div>
  </div>
@endsection
