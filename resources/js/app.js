require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
// import LaravelVuePagination from 'laravel-vue-pagination';

Vue.use(VueRouter); 
//  Vue.component('pagination', require('laravel-vue-pagination'));

import Form from  './components/tasks/Form.vue';
import Lists from  './components/tasks/Lists.vue';
import Edit from  './components/tasks/Edit.vue';

const routes = [
    {
        path: "/form",
        component: Form,
    },
    {
        path: "/",
        component: Lists,
    },
    {
        path: "/edit/:id",
        component: Edit,
    },
];

const router = new VueRouter({
    routes
});

const app = new Vue({
    el: '#app',
    router : router,
}); 
