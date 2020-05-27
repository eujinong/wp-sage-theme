
{{--
  Template Name: Blog Landing Page
--}}
@extends('layouts.app')
@section ('content')
  <?php
    $posts = get_category_post(array('category_name' => 'blog'));
  ?>
  @include ('blocks.blog-header')
  <div class="block posts-block">
    <div class="container">
      <div class="row">
        @if ($posts)
          <?php
            foreach ( $posts as $post ) :
            setup_postdata( $post );
          ?>
            <div class="col-md-6">
              @include ('blocks.post', [
                'data' => (object)[
                  'image' => get_the_post_thumbnail_url( $post->ID ),
                  'action_link' => get_the_permalink($post->ID),
                  'action_title' => get_the_tags($post->ID)[0]->name,
                  'post_title' => get_the_title($post->ID),
                  'post_date' => get_the_date('', $post->ID),
                  'post_type' => 'QOL',
                  'button_link' => get_the_permalink($post->ID)
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
  @include('sections.blocks')
@endsection