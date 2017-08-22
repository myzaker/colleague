export default {
    methods: {
        loadDepartments () {
            return axios.get(laroute.route('departments.index')).then(response => response.data);
        },

        updateDepartmentsSort (departments) {
            const url = laroute.route('departments.sort');

            return axios.put(url, departments);
        },

        loadDepartmentGroups (department) {
            const url = laroute.route('departments.groups.index', {department});

            return axios.get(url).then(response => response.data);
        },

        getDepartment (id) {
            const url = laroute.route('departments.show', {department: id});

            return axios.get(url).then(response => response.data);
        },

        getDepartmentGroup (department, group) {
            const url = laroute.route('departments.groups.show', {department, group});

            return axios.get(url).then(response => response.data);
        },

        createDepartment (department) {
            const url = laroute.route('departments.store');

            return axios.post(url, department);
        },

        createDepartmentGroup (department, group) {
            const url = laroute.route('departments.groups.store', {department});

            return axios.post(url, group).then(response => response.data);
        },

        updateDepartment (id, department) {
            const url = laroute.route('departments.update', {department: id});

            return axios.put(url, department);
        },
    },
};
