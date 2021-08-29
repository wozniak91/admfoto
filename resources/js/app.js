import Vue from 'vue';
import App from './components/App';
import router from './router';
// import VueLodash from 'vue-lodash';
import {VueMasonryPlugin} from 'vue-masonry';
import Meta from 'vue-meta';
import VueSilentbox from 'vue-silentbox';
import NProgress from 'nprogress';
import VueLazyload from 'vue-lazyload';
import Notifications from 'vue-notification'

// import {Workbox} from 'workbox-window';

// if ('serviceWorker' in navigator) {
//   const wb = new Workbox('/service-worker.js');
//   wb.register();
// }

// Vue.use(VueLodash);
Vue.use(VueMasonryPlugin);
Vue.use(Meta);
Vue.use(VueSilentbox);
Vue.use(VueLazyload);
Vue.use(Notifications)

Vue.config.productionTip = false

require('./bootstrap');

NProgress.settings.showSpinner = false;

router.beforeResolve((to, from, next) => {
  if (to.name) {
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  NProgress.done()
})

Vue.prototype.$Nprogress = NProgress;

new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})


