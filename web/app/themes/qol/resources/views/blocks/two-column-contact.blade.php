<div class="block two-column-contact-block">
  <div class="container">
    @if (isset($data->block_title))
      <h1 class="block-title h5 h1-md">{{ $data->block_title }}</h1>
    @endif
    <div class="row">
      <div class="col-lg-7">
        @if (isset($data->faqs))
          <div id="faq-values" class="accordian">
            @foreach($data->faqs as $index => $item)
              <div class="card">
                <div class="card-header px-lg-5" id="faq-values-heading-{{ $index }}" data-toggle="collapse"
                    data-target="#faq-values-collapse-{{ $index }}" 
                    aria-expanded="{{ $index ? 'false' : 'true' }}"
                    aria-controls="faq-values-collapse-{{ $index }}">
                  <span>{{ $item->title }}</span>
                  <i class="icon icon-plus icon-xs"></i>
                  <i class="icon icon-minus icon-xs"></i>
                </div>
                <div id="faq-values-collapse-{{ $index }}" class="collapse {{ $index ? '' : 'show' }}" aria-labelledby="faq-values-heading-{{ $index }}"
                    data-parent="#faq-values">
                  <div class="card-body px-lg-5">{!! $item->description !!}</div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
        @if (isset($data->qol_panels))
          @foreach($data->qol_panels as $item)
            <div class="card card-qol">
              <div class="card-body">
                @if (isset($item->title))
                  <div class="title">{{ $item->title }}</div>
                @endif
                @if (isset($item->subtitle))
                  <div class="subtitle">{{$item->subtitle}}</div>
                @endif
                @if (isset($item->content))
                  <div class="content">{!! $item->content !!}</div>
                @endif
                @if (isset($item->button_link))
                  <a class="btn btn-success" target="_blank" href={{ $item->button_link }}>
                    {{ $item->button_title }}
                  </a>
                @endif
              </div>
            </div>
          @endforeach
        @endif
        @if (isset($data->contact_items))
          @if (isset($data->sub_title))
            <h1 class="sub-title h5 h1-md">{{ $data->sub_title }}</h1>
          @endif
          <div class="contact-items">
            @foreach($data->contact_items as $item)
              <div class="contact-item">
                <h6 class="contact-type">
                  {{ $item->contact_type }}
                </h6>
                <div class="contact-info">
                  {{ $item->contact_info }}
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