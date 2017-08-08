export default {
    data () {
        return {
            admin: null,
        };
    },

    mounted () {
        if (null === this.admin)
            this.isAdmin();
    },

    methods: {
        isAdmin () {
            axios.get(laroute.route('permission.admin')).then((response) => {
                this.admin = response.data.is_admin;
            });
        },
    },
};
