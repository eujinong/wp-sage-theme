{{--
  Template Name: Resources Page
--}}
@extends('layouts.app')
@section ('content')
  <?php
    $posts = get_category_post(array('category_name' => 'resource'));
  ?>
  @include ('blocks.resources-filter')
  <div class="block resources-block">
    <div class="container">
      <div class="row">
        @if ($posts)
          <?php
            foreach ( $posts as $post ) :
            setup_postdata( $post );
          ?>
            <div class="col-lg-4 col-md-6">
              @include ('blocks.resource', [
                'data' => (object)[
                  'image' => get_the_post_thumbnail_url( $post->ID ),
                  'action_link' => get_field('post_type', $post->ID) === 'video' ? get_field('post_video', $post->ID) : get_field('post_document', $post->ID),
                  'action_title' => get_the_tags($post->ID)[0]->name,
                  'title' => get_the_title($post->ID),
                  'type' => get_field('post_type', $post->ID)
                ]
              ])
            </div>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
        @endif
      </div>
      <div class="text-center">
        @include ('shared.pagination')
      </div>
    </div>
  </div>
@endsection
