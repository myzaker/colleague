export default {
    methods: {
        loadDepartments () {
            return axios.get(route('departments.index')).then(response => response.data);
        },

        updateDepartmentSorts (departments) {
            const url = route('departments.sort');

            return axios.put(url, departments);
        },

        loadDepartmentGroups (department) {
            const url = route('departments.groups.index', {department});

            return axios.get(url).then(response => response.data);
        },

        getDepartment (id) {
            const url = route('departments.show', {department: id});

            return axios.get(url).then(response => response.data);
        },

        getDepartmentGroup (department, group) {
            const url = route('departments.groups.show', {department, group});

            return axios.get(url).then(response => response.data);
        },

        createDepartment (department) {
            const url = route('departments.store');

            return axios.post(url, department);
        },

        createDepartmentGroup (department, group) {
            const url = route('departments.groups.store', {department});

            return axios.post(url, group).then(response => response.data);
        },

        updateDepartment (id, department) {
            const url = route('departments.update', {department: id});

            return axios.put(url, department);
        },
    },
};
