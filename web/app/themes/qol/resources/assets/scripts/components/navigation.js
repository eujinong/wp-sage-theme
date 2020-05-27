class Navigation extends HTMLElement {
  constructor() {
    super();
    this.handleNavigationToggle = this.handleNavigationToggle.bind(this);
    this.handleWindowResize = this.handleWindowResize.bind(this);
    this.handleCollapseSubmenus = this.handleCollapseSubmenus.bind(this);
    this.init();
  }

  init() {
    this.toggler = this.querySelector('.navigation .navigation-toggler');
    this.toggler.addEventListener('click', this.handleNavigationToggle);
    window.addEventListener('resize', this.handleWindowResize);

    this.submenuItems = this.querySelectorAll('.navigation-menu > li.has-submenu');
    this.submenuItems.forEach((submenuItem) => {
      submenuItem.addEventListener('click', this.handleToggleSubMenu.bind(this, submenuItem));
    });

    document.body.addEventListener('click', this.handleCollapseSubmenus);
  }

  handleCollapseSubmenus(event) {
    const currentMenuItem = event.target.parentElement;
    let clickInside = false;
    for(let i=0, ni=this.submenuItems.length; i<ni; i++) {
      const menuItem = this.submenuItems[i];
      if (menuItem === currentMenuItem) {
        clickInside = true;
      }
    }
    if (!clickInside) {
      this.submenuItems.forEach((menuItem) => {
        menuItem.classList.remove('expanded');
      });
    }
  }

  handleToggleSubMenu(currentMenuItem) {
    this.submenuItems.forEach((menuItem) => {
      if (menuItem === currentMenuItem) {
        menuItem.classList.toggle('expanded');
      } else {
        menuItem.classList.remove('expanded');
      }
    });
  }

  handleWindowResize() {
    if (window.innerWidth >= 1120) {
      document.body.classList.remove('navigation-opened');
      this.applyNavigationHeight();
    }
  }

  handleNavigationToggle() {
    document.body.classList.toggle('navigation-opened');
    this.applyNavigationHeight();
  }

  applyNavigationHeight() {
    const site = document.body.querySelector('.site');
    const navigationMain = this.querySelector('.navigation-main');
    const navigationCollapsible = this.querySelector('.navigation-collapsible');
    if (document.body.classList.contains('navigation-opened')) {
      const height = navigationMain.clientHeight + navigationCollapsible.clientHeight;
      site.style.height = `${height}px`;
    } else {
      site.style.height = 'inherit';
    }
  }
}

export default Navigation;
