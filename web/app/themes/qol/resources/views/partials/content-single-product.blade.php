<article @php post_class() @endphp style="background: #fff">
  @include ('blocks.hero-other', [
    'data' => (object)[
      'background_image' => App\asset('dist/media/heros/my-scan-mate-2.jpg')
    ]
  ])
  
  <div class="container-fluid pt-0" style="background-color: #fff">

    <div class="sub-container p-5" style="max-width: 1080px; margin: 0 auto;">

      <div class="row">
        <div class="col-lg-7">
          <header>
            <h1 class="entry-title">{!! get_the_title() !!}</h1>
          </header>

          <div class="entry-content">
            @php the_content() @endphp
          </div>
        </div>

        <div class="col-lg-5">
          {!! do_shortcode('[woocommerce_cart]') !!}
        </div>
      </div>
    </div>
  </div>
</article>
@include('sections.blocks')

