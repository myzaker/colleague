export default new VueRouter({
    mode: 'history',
    base: window.basePath ? window.basePath : '/',
    routes: [
        {
            path: '/',
            redirect: '/departments',
        },

        // Department
        {
            path: '/departments',
            component: require('./pages/departments/Index.vue'),
        },
        {
            path: '/departments/:id',
            component: require('./pages/departments/Detail.vue'),
        },

        // Staff
        {
            path: '/staff/create',
            component: require('./pages/staff/Create.vue'),
        },
        {
            path: '/staff/:id/edit',
            component: require('./pages/staff/Edit.vue'),
        },
        {
            path: '/staff/:id',
            component: require('./pages/staff/Detail.vue'),
        },
    ],
});
