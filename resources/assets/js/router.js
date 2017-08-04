export default new VueRouter({
    routes: [
        {
            path: '/',
            redirect: '/departments',
        },
        {
            path: '/departments',
            component: require('./pages/departments/Index.vue'),
        },
    ],
});
