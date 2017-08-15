import store from './store';
import router from './router';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('gender-symbol', require('./components/GenderSymbol.vue'));
Vue.component('identicon', require('./components/Identicon.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('add-button-card', require('./components/AddButtonCard.vue'));

new Vue({
    el: '#app',

    store, router,

    created () {
        axios.get(laroute.route('auth.user')).then(response => this.$store.commit('setAuth', response.data));
    },
});
