import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';
import store from './vuex/store';
import Vue2Filters from 'vue2-filters';
import BaseApp from './components/BaseApp.vue';

Vue.use(Router);
Vue.use(Resource);
Vue.use(Vue2Filters);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

// Initialize the router
let router = new Router({
    routes: [
    { path: '/', component: BaseApp }
    // { path: '*', component: _404 }
    ],
    mode: 'history'
});

new Vue({
    el: '#app',
    store,
    router: router,
    components: { 'base-app': BaseApp }
})
