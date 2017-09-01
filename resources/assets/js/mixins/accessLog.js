export default {
    methods: {
        emitLogEvent (loggable) {
            const log = _.zipObject(
                ['type', 'origin', 'object'],
                loggable.split('.'),
            );

            vue.$emit('log-access', log);
        },

        logAccession (type, object, origin) {
            axios.post(route('logs.store'), {type, origin, object_id: object});
        },
    },
};
