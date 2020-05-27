import '@webcomponents/webcomponentsjs';
import 'popper.js';
import 'bootstrap/js/dist/util';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/dropdown';
import 'slick-carousel';
import '@fancyapps/fancybox';

import Navigation from './components/navigation';
import Hero from './components/hero';
import VideoPlayer from './components/resource';
import NinjaForm from './components/ninja-form';

customElements.define('app-navigation', Navigation);
customElements.define('app-hero', Hero);
customElements.define('app-resource', VideoPlayer);
customElements.define('app-ninja-form', NinjaForm);
