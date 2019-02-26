
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window._ = require('lodash');
window.moment = require('moment');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('my-navbar', require('./components/Navbar.vue').default);
Vue.component('invoice-slip', require('./components/InvoiceSlip.vue').default);
Vue.component('material-slip', require('./components/MaterialSlip.vue').default);
Vue.component('pen-mortalities', require('./components/PenMortalities.vue').default);

Vue.filter('currencyFormat', function (value) {
	return value.toLocaleString('en-PH',{minimumFractionDigits: 2, maximumFractionDigits: 2});
});

Vue.filter('weightFormat', function (value) {
	return value.toLocaleString('en-PH',{minimumFractionDigits: 3, maximumFractionDigits: 3});
});