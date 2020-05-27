class Hero extends HTMLElement {
  constructor() {
    super();
    
    this.handleSlickChange = this.handleSlickChange.bind(this);
    this.handleDetailIn = this.handleDetailIn.bind(this);
    this.handleDetailOut = this.handleDetailOut.bind(this);
    this.currentSlide = 0;
    this.init();
  }

  init() {
    this.$slick = $(this.querySelector('.hero-slick')).slick({
      // fade: true,
      pauseOnDotsHover: false,
      pauseOnHover: false,
      pauseOnFocus: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 8000,
      appendDots: this.querySelector('.post-navigation'),
      dots: true
    });
    this.box = this.querySelector('.hero-box');
    if (this.box) {
      this.$box = $(this.querySelector('.hero-box'));
      this.$slick.on('afterChange', this.handleSlickChange);
      this.updateActiveContent(this.$slick.slick('getSlick'), 0);
    }
  }

  updateActiveContent(slick, currentSlide) {
    const $slide = $(slick.$slides[currentSlide]);
    const $content = $slide.find('script[data-item="post-info"]');
    const content = $content.html();
    const $post = this.$box.find('.post-info');
    $post.fadeOut(() => {
      $post.html(content).fadeIn(() => {
        $post.find('.arrow-link').hover(this.handleDetailIn, this.handleDetailOut);
      });
    });
    // this.animateCSS(this.box);
  }

  handleSlickChange(event, slick, currentSlide) {
    if (this.currentSlide !== currentSlide) {
      this.updateActiveContent(slick, currentSlide);
      this.currentSlide = currentSlide;
    }
  }

  handleDetailIn() {
    this.$slick.slick('slickPause');
    console.log('pause');
  }

  handleDetailOut() {
    this.$slick.slick('slickPlay');
    console.log('play');
  }

  animateCSS(element, callback) {
    const animationName = 'rollIn';
    element.classList.add('animated', animationName);

    function handleAnimationEnd() {
      element.classList.remove('animated', animationName);
      element.removeEventListener('animationend', handleAnimationEnd);
      if (typeof callback === 'function') callback();
    }
    element.addEventListener('animationend', handleAnimationEnd);
  }
}

export default Hero;
