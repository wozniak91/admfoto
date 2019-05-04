import Vue from 'vue';
import App from './components/App';
import router from './router';
import VueLodash from 'vue-lodash';
import {VueMasonryPlugin} from 'vue-masonry';
import Meta from 'vue-meta';
import VueSilentbox from 'vue-silentbox';
import NProgress from 'nprogress';

Vue.use(VueLodash);
Vue.use(VueMasonryPlugin);
Vue.use(Meta);
Vue.use(VueSilentbox);

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


