/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import VueRouter from 'vue-router'
import axios from 'axios';
import store from './store'

import {default as ShowComponent} from './components/ShowComponent.vue';
import {default as EventComponent} from './components/EventComponent.vue';
import {default as PlaceComponent} from './components/PlaceComponent.vue';
import {default as HomeComponent} from './components/HomeComponent.vue';
import {default as RegisterComponent} from './components/RegisterComponent.vue';
import {default as AppComponent} from './components/AppComponent.vue';
import {default as LoginComponent} from './components/LoginComponent.vue';

Vue.use(VueRouter);

axios.defaults.baseURL = 'http://localhost:88/api';

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {name: 'home', path: '/', component: HomeComponent},
        {name: 'register', path: '/register',  component: RegisterComponent, meta: {auth: false}},
        {name: 'login', path: '/login',  component: LoginComponent, meta: {auth: false}},
        {name: 'shows', path: '/shows', component:ShowComponent, meta: {auth: true}},
        {name: 'events',  path: '/shows/:show_id/events', component: EventComponent, meta: {auth: true},
            props: (route) => ({ show_id: Number(route.params.show_id) })
        },
        {name: 'places',  path: '/events/:event_id/places', component: PlaceComponent, meta: {auth: true},
            props: (route) => ({ place_id: Number(route.params.place_id) })
        },
    ]
});
Vue.router = router;

AppComponent.router = Vue.router;
//AppComponent.store = Vue.store;

new Vue({
        store,
        render: h => h(AppComponent)
    },
).$mount('#app');
