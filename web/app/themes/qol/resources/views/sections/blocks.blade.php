@php
  $recents = get_category_post(array('posts_per_page' =>3, 'category_name' => 'blog'));
@endphp
@if(have_rows('blocks'))
  @php
    $blocks = get_field('blocks');
    foreach($blocks as $block) :
      the_row();
      if ($block['acf_fc_layout'] === 'hero_carousel') :
        @endphp
          <app-hero class="block hero-block <?php echo get_sub_field('options').'-hero-block';?>">
            <div class="hero-slick">
              @foreach(get_sub_field('galleries') as $item)
                <div class="slick-item">
                  <div class="featured-image" style="background-image: url('{{ $item['featured_image'] }}')">
                  </div>
                  @if (isset($item['action_link']) && $item['action_link'] !== '')
                    <script data-item="post-info" type="text/html">
                      <h2 class="title">{{ $item['title'] }}</h2>
                      <div class="content">{!! $item['content'] !!}</div>
                      <a class="arrow-link text-white" href="{{ $item['action_link'] }}">{{ $item['action_title'] }}</a>
                    </script>
                  @else
                    <script data-item="post-info" type="text/html">
                      <h2 class="title">{{ $item['title'] }}</h2>
                      <div class="content">{!! $item['content'] !!}</div>
                    </script>
                  @endif
                </div>
              @endforeach
            </div>
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 col-12">
                  <div class="hero-box">
                    <div class="post-navigation">
                    </div>
                    <div class="post-info">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </app-hero>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'boxed_content_with_pattern') :
        @endphp
          <div class="block about-block">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <div class="titles">
                    @foreach(get_sub_field('titles') as $title)
                      <h5 class="title">{{ $title['title'] }}</h5>
                    @endforeach
                  </div>
                  <div class="content">
                    {!! get_sub_field('content') !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'side_by_side') :
        @endphp
          <div class="block two-column-block @if (get_sub_field('options') === 'reverse') {{ 'column-reverse-block' }} @endif">
            <div class="column-block-item">
              <div class="featured-image"
                style="background-image: url('{{ get_sub_field('featured_image') }}')"
              >
              </div>
            </div>
            <div class="column-block-item">    
              <div class="info">
                <h1 class="title">{{ get_sub_field('title') }}</h1>
                @if (get_sub_field('subtitle') !== '')
                  <div class="subtitle">{{ get_sub_field('subtitle') }}</div>
                @endif
                <div class="content">{!! get_sub_field('content') !!}</div>
                @if (get_sub_field('action_link') !== '')
                  <a class="arrow-link action" href="{{ get_sub_field('action_link') }}">
                    {{ get_sub_field('action_title') }}
                  </a>
                @endif
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'image_with_content') :
        @endphp
          <div class="block products-block">
            <div class="container">
              @foreach (get_sub_field('products') as $item)
                <div class="product">
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="featured-image">
                        <img src="{{ $item['featured_image'] }}">
                      </div>
                    </div>
                    <div class="offset-lg-1 col-lg-6">
                      <h1 class="title">
                        {{ $item['title'] }}
                      </h1>
                      <div class="content">
                        {!! $item['content'] !!}
                      </div>
                      @if (isset($item['action_link']) && !empty($item['action_link']))
                        <a class="arrow-link" href="{{ $item['action_link'] }}">Learn more</a>
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'image_with_content_blue_pattern') :
        @endphp
          <div class="block order-processing-block">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-lg-8">
                  <div class="processing-image">
                    <img src="{{ get_sub_field('image') }}" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="order-processing">
                    <h5 class="title text-white">{{ get_sub_field('title') }}</h5>
                    <div class="content text-white">
                      {!! get_sub_field('content') !!}
                    </div>
                    <div class="actions">
                      @if (get_sub_field('action_link1') !== '')
                        <a href="{{ get_sub_field('action_link1') }}" class="arrow-link text-white">{{ get_sub_field('action_title1') }}</a>
                      @endif
                      @if (get_sub_field('action_link2') !== '')
                        <a href="{{ get_sub_field('action_link2') }}" class="arrow-link text-white" target="_blank">{{ get_sub_field('action_title2') }}</a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'recent_posts') :
        @endphp
          <div class="block recent-posts-block">
            <div class="container">
              <h4 class="title text-primary">Recent Posts</h4>
              <div class="row">
                @if ($recents)
                  @php
                    foreach ( $recents as $post ) :
                    setup_postdata( $post );
                  @endphp
                    <div class="col-lg-4 col-md-6">
                      @include ('blocks.recent', [
                        'data' => (object)[
                          'image' => get_the_post_thumbnail_url( $post->ID ),
                          'action_link' => get_the_permalink($post->ID),
                          'action_title' => get_the_tags($post->ID)[0]->name,
                          'title' => get_the_title($post->ID)
                        ]
                      ])      
                    </div>
                  @php
                    endforeach;
                    wp_reset_postdata();
                  @endphp
                @endif
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'full_width_promo') :
        @endphp
          <div class="block help-block" style="background-image: url('{{ get_sub_field('image') }}')">
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <div class="help-content">
                    <h1 class="title text-white h4 h1-md">{{ get_sub_field('title') }}</h1>
                    <div class="content text-white">{!! get_sub_field('content') !!}</div>
                    @if (get_sub_field('action_link') !== '')
                      <a class="arrow-link text-white" href={{ get_sub_field('action_link') }}>
                        {{ get_sub_field('action_title') }}
                      </a>
                    @endif
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="inner-image"></div>
                </div>
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'main_content_with_grey') :
        @endphp
          <div class="block one-column-block @if (get_sub_field('background_type') === 'no') {{ 'no-background-block' }} @endif">
            <div class="sub-container">
              <h1 class="h4 h1-md title">{{ get_sub_field('title') }}</h1>
              @if (get_sub_field('subtitle') !== '')
                <div class="subtitle">{{ get_sub_field('subtitle') }}</div>
              @endif
            </div>
            @if (get_sub_field('services'))
              <div class="service-panel">
                <div class="services">
                  <div class="row">
                    @foreach(get_sub_field('services') as $item)
                      <div class="col-md-4">
                        <div class="service">
                          <div class="service-icon">
                            <img class="icon icon-lg" src="{{ $item['service_icon'] }}" />
                          </div>
                          <div class="service-title">
                            {{ $item['service_title'] }}
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            @endif
            <div class="sub-container">
              @if (get_sub_field('main_content'))
                <div class="content">{!! get_sub_field('main_content') !!}</div>
              @endif
              @if (get_sub_field('button_link') !== '')
                <div class="button-link">
                  <a class="btn btn-success" href={{ get_sub_field('button_link') }} download>
                    Download Sizing Chart
                  </a>
                </div>
              @endif
              @if (get_sub_field('action_link') !== '')
                <a class="arrow-link text-primary" target="_blank" href="{{ get_sub_field('action_link') }}">Learn More</a>
              @endif
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'hero_image') :
        @endphp
          <div class="block hero-block main-hero-block justify-content-center"
            @if(get_sub_field('background_image'))
              style="background-image: url('{{ get_sub_field('background_image') }}')"
            @endif
          >
            @if (get_sub_field('feature_image'))
              <div class="feature-image">
                <img src={{ get_sub_field('feature_image') }} />
              </div>
            @endif
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'boxed_content_complexed_with_pattern') :
        @endphp
          <div class="block approach-block">
            <div class="our-approach">
              <div class="text-center">
                <h1 class="title h4 h1-md text-center">{{ get_sub_field('title') }}</h1>
                <div class="content">
                  {!! get_sub_field('content') !!}
                </div>
              </div>
              <div class="container">
                <div class="row">
                  @if (get_sub_field('items'))
                    @foreach(get_sub_field('items') as $item)
                      <div class="col-md-4">
                        <div class="card card-approach">
                          <div class="d-flex align-items-center">
                            <img class="icon icon-md" src="{{ $item['icon_image'] }}" />
                            <div class="approach-title">
                              {{ $item['approach_title'] }}
                            </div>
                          </div>
                          <div class="approach-description">
                            {!! $item['approach_description'] !!}
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'main_content_with_white') :
        @endphp
          <div class="block story-block">
            <div class="container">
              <div class="main">
                <h1 class="title">{{ get_sub_field('title') }}</h1>
                <div class="content">
                  {!! get_sub_field('content') !!}
                </div>
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'image_with_content_list') :
        @endphp
          <div class="block team-block">
            <div class="container">
              <h1 class="title">{{ get_sub_field('title')}}</h1>
              @if (get_sub_field('content'))
                <div class="content">
                  {!! get_sub_field('content') !!}
                </div>
              @endif
              @if (get_sub_field('members'))
                @foreach(get_sub_field('members') as $item)
                  <div class="team-member">
                    <div class="member-image" style="background-image: url('{{ $item['image'] }}')">
                    </div>
                    <div class="member-info">
                      <h6 class="member-name">
                        {{ $item['member_name'] }}
                      </h6>
                      <div class="member-description">
                        {!! $item['member_description'] !!}
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'content_with_contact_form') :
        @endphp
          <div class="block two-column-contact-block">
            <div class="container">
              @if (get_sub_field('block_title'))
                <h1 class="block-title h5 h1-md">{{ get_sub_field('block_title') }}</h1>
              @endif
              <div class="row">
                <div class="col-lg-7">
                  @if (get_sub_field('faqs'))
                    <div id="faq-values" class="accordian">
                      @foreach(get_sub_field('faqs') as $index => $item)
                        <div class="card">
                          <div class="card-header px-lg-5" id="faq-values-heading-{{ $index }}" data-toggle="collapse"
                              data-target="#faq-values-collapse-{{ $index }}" 
                              aria-expanded="{{ $index ? 'false' : 'true' }}"
                              aria-controls="faq-values-collapse-{{ $index }}">
                            <span>{{ $item['title'] }}</span>
                            <i class="icon icon-plus icon-xs"></i>
                            <i class="icon icon-minus icon-xs"></i>
                          </div>
                          <div id="faq-values-collapse-{{ $index }}" class="collapse {{ $index ? '' : 'show' }}" aria-labelledby="faq-values-heading-{{ $index }}"
                              data-parent="#faq-values">
                            <div class="card-body px-lg-5">{!! $item['description'] !!}</div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endif
                  @if (get_sub_field('qol_panels'))
                    @foreach(get_sub_field('qol_panels') as $item)
                      <div class="card card-qol">
                        <div class="card-body">
                          @if ($item['title'])
                            <div class="title">{{ $item['title'] }}</div>
                          @endif
                          @if ($item['subtitle'])
                            <div class="subtitle">{{ $item['subtitle'] }}</div>
                          @endif
                          @if ($item['content'])
                            <div class="content">{!! $item['content'] !!}</div>
                          @endif
                          @if ($item['button_link'])
                            <a class="btn btn-success" target="_blank" href={{ $item['button_link']}}>
                              {{ $item['button_title'] }}
                            </a>
                          @endif
                        </div>
                      </div>
                    @endforeach
                  @endif
                  @if (get_sub_field('contact_items'))
                    @if (get_sub_field('sub_title'))
                      <h1 class="sub-title h5 h1-md">{{ get_sub_field('sub_title') }}</h1>
                    @endif
                    <div class="contact-items">
                      @foreach(get_sub_field('contact_items') as $item)
                        <div class="contact-item">
                          <h6 class="contact-type">
                            {{ $item['contact_type'] }}
                          </h6>
                          <div class="contact-info">
                            {{ $item['contact_info'] }}
                          </div>
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
                <div class="col-lg-5">
                  <app-ninja-form>
                    {!! do_shortcode('[ninja_form id=1]') !!}
                  </app-ninja-form>
                </div>
              </div>
            </div>
          </div>
        @php
      endif;
      if ($block['acf_fc_layout'] === 'mailing_list_blue_pattern') :
        @endphp
          <div class="block hexagon-block">
            <div class="container">
              <div class="text-center text-white">
                @if (get_sub_field('title'))
                  <h5 class="title text-white">{{ get_sub_field('title') }}</h5>
                @endif
                <div class="content">
                  @if (get_sub_field('content'))
                    {!! get_sub_field('content') !!}
                  @endif
                </div>
                {!! do_shortcode('[ninja_form id=3]') !!}
              </div>
            </div>
          </div>
        @php
      endif;
    endforeach
  @endphp
@endif