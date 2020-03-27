/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import "vue-select/dist/vue-select.css";
import vSelect from "vue-select";

// import Swal from 'sweetalert2'
require('./bootstrap');
// import 'sweetalert2/src/sweetalert2.scss'
window.Vue = require('vue');
window.Swal = require('sweetalert2');
window._ = require('lodash');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('n-table', require('./components/nTable.vue').default);
Vue.component('n-form', require('./components/nForm.vue').default);
Vue.component("v-select", vSelect);

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

// import jQuery from 'jquery';
//   window.jQuery = window.$ = jQuery;
// require('select2')


// CommonJS
// const Swal = require('sweetalert2');

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + Laravel.apiToken,
};

axios.defaults.baseURL =  'http://laravellab.com/api/v1/';

Vue.prototype.$http = axios


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
