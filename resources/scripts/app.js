import {domReady} from '@roots/sage/client';
import Alpine from 'alpinejs'
import { library, dom } from '@fortawesome/fontawesome-svg-core';
import { faFacebook, faInstagram, faLinkedin, faPinterest, faSpotify, faTwitter, faVimeo, faYoutube } from "@fortawesome/free-brands-svg-icons";
 
window.Alpine = Alpine
Alpine.start()

library.add(faFacebook, faInstagram, faLinkedin, faPinterest, faSpotify, faTwitter, faVimeo, faYoutube);
dom.watch();

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
