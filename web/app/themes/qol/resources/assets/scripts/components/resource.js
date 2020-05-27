class VideoPlayer extends HTMLElement {
  constructor() {
    super();
    this.fancyboxVideo = this.querySelector('[data-fancybox-video]');
    this.fancyboxVideoByTitle = this.querySelector('.title');
    this.fancyboxVideoByButton = this.querySelector('.btn');
    this.fancyboxVideoByTitle.addEventListener('click', this.handleClick.bind(this));
    this.fancyboxVideoByButton.addEventListener('click', this.handleClick.bind(this));
    $(this.fancyboxVideo).fancybox({
      buttons: [
        "close"
      ],
      baseClass: 'fancybox-video'
    });
  }
  handleClick() {
    this.fancyboxVideo.click();
  }
}

export default VideoPlayer;