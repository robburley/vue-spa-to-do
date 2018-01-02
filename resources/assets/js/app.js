import './bootstrap';

import VueRouter from 'vue-router';
import router from './routes.js';
import Form from './Form/Form';

window.Form = Form;

Vue.use(VueRouter);

window.Event = new Vue();

const app = new Vue({
    el: '#app',
    router
});
