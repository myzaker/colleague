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
        {
            path: '/departments/:id',
            component: require('./pages/departments/Detail.vue'),
        },
    ],
});
