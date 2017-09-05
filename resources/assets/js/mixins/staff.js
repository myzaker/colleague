export default {
    methods: {
        getStaff (id) {
            const url = route('staff.show', {staff: id});

            return axios.get(url).then(response => response.data);
        },

        createStaff (profile) {
            return axios.post(route('staff.store'), profile);
        },

        updateStaff (id, profile) {
            return axios.put(route('staff.update', {staff: id}), profile);
        },
    },
};
