export default {
    methods: {
        getStaff (id) {
            const url = laroute.route('staff.show', {staff: id});

            return axios.get(url).then(response => response.data);
        },

        createStaff (profile) {
            return axios.post(laroute.route('staff.store'), this.form);
        },

        updateStaff (id, profile) {
            return axios.put(laroute.route('staff.update', {staff: id}), profile);
        },
    },
};
