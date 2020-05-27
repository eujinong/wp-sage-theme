<article @php post_class() @endphp>
  <header>
    <div class="block page-header-block detail-header-block">
      <div class="container">
        <div class="back-action">
          <a href="/blog" class="back-link text-primary">
            <i class="icon icon-chevron-left icon-ts"></i>
            Back to QOL Blog
          </a>
        </div>
        <button class="btn btn-primary border-radius-none"><?php echo get_the_tags()[0]->name;?></button>
        <h1 class="title entry-title">
          {!! get_the_title() !!}
        </h1>
        @include('partials/entry-meta')
      </div>
    </div>
  </header>
  <div class="block blog-detail-block">
    <div class="featured-image" style="background-image: url('{{ get_the_post_thumbnail_url() }}')"></div>
    <div class="container">
      <div class="content">
        @php the_content() @endphp  
      </div>
      <div class="other-articles">
        <h5 class="title">Other articles</h5>
        <div class="row">
          <?php
            $posts = get_category_post(array('posts_per_page' =>4, 'category_name' => 'blog'));
          ?>
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
      </div>
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  
</article>