import VueRouter from 'vue-router';


let routes = [
    {
        path: '/',
        component: require('./components/Tasks')
    },

    {
        path: '/completed',
        component: require('./components/Completed')
    },
];

export default window.router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes
});