import store from './store';
import router from './router';
import accesslogMixin from './mixins/accessLog';
import accesslogDirective from './directives/accessLog';

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

Vue.directive('accesslog', accesslogDirective);

Vue.component('gender-symbol', require('./components/GenderSymbol.vue'));
Vue.component('identicon', require('./components/Identicon.vue'));
Vue.component('add-button-card', require('./components/AddButtonCard.vue'));

Vue.component('search', require('./partials/Search.vue'));

window.vue = new Vue({
    el: '#app',

    store, router,

    mixins: [accesslogMixin],

    created () {
        this.$on('log-access', log => {
            this.logAccession(log.type, log.object, log.origin);
        });

        axios.get(laroute.route('auth.user')).then(response => this.$store.commit('setAuth', response.data));
    },
});
