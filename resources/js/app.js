
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window._ = require('lodash');
window.moment = require('moment');

import vSuggest from 'v-suggest';
Vue.use(vSuggest);
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
Vue.component('my-modal', require('./components/Modal.vue').default);
Vue.component('my-suggest', require('./components/SuggestInput.vue').default);
Vue.component('receivings', require('./components/Receivings.vue').default);
Vue.component('harvests', require('./components/Harvests.vue').default);
Vue.component('deliveries', require('./components/Deliveries.vue').default);

//Vue.component('grow-employee-assignments', require('./components/EmployeeAssignments.vue').default);
Vue.component('invoice-slip', require('./components/InvoiceSlip.vue').default);

Vue.component('material-slip', require('./components/MaterialSlip.vue').default);
Vue.component('pen-mortalities', require('./components/PenMortalities.vue').default);
Vue.component('pen-weighings', require('./components/PenWeighings.vue').default);

Vue.filter('minToHourMinute', function (value) {
	let minute = value % 60;
	let hour = Math.floor(value / 60);

	if(minute < 10)
		minute = '0' + minute; 

	if(hour == 0)
		return '00:' + minute;
	else if (hour < 10)
		return '0' + hour + ':' + minute;
	else
		return hour + ':' + minute;
});

Vue.filter('capitalize', function (value) {
	return value.toUpperCase();
});

Vue.filter('timeFormat', function (value) {
	return moment('2018-08-08 ' + value).format('hh:mm A');
});

Vue.filter('currencyFormat', function (value) {
	return value.toLocaleString('en-PH',{minimumFractionDigits: 2, maximumFractionDigits: 2});
});

Vue.filter('weightFormat', function (value) {
	return value.toLocaleString('en-PH',{minimumFractionDigits: 3, maximumFractionDigits: 3});
});

Vue.filter('numberFormat', function (value) {
	return value.toLocaleString('en-PH',{minimumFractionDigits: 0, maximumFractionDigits: 0});
});

Vue.filter('fcrFormat', function (value) {
	return value.toLocaleString('en-PH',{minimumFractionDigits: 4, maximumFractionDigits: 4});
});