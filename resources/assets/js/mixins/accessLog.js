export default {
    methods: {
        logAccession (type, object, origin) {
            axios.post(laroute.route('logs.store'), {type, origin, object_id: object});
        },
    },
};
