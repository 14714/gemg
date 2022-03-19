/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// const { default: Vuetify } = require('vuetify');

require('./bootstrap');

window.Vue = require('vue').default;

window.moment = require("moment");
window.moment.locale("es");

//Import Vue Filter
require("./filter");

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
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('nosotros-component', require('./components/NosotrosComponent.vue').default);
Vue.component('faq-component', require('./components/FaqComponent.vue').default);
Vue.component('servicios-component', require('./components/ServiciosComponent.vue').default);
Vue.component('error-component', require('./components/ErrorComponent.vue').default);
Vue.component('news-component', require('./components/news/NewsComponent.vue').default);
Vue.component('news-show', require('./components/news/ShowNewsComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import Vuetify from 'vuetify';
 Vue.use(Vuetify); 

 
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data:{
        user:'',
        lastPage:'',
    },
    methods:{
        async logout(){
            await axios.post('logout');
            location.reload();
        },
        login(){
            // this.lastPage = window.location.pathname;
            window.location.href = 'login';
        }
    }
});
