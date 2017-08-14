<template>
    <staff-form
            v-if="loaded"
            mode="edit"
            :departments="departments"
            :currentDepartmentId="staff.department.id"
            :staff="staff"
            @submit="handleSubmit">
    </staff-form>
</template>

<script>
    import Form from './mixins/form';

    export default {
        mixins: [Form],

        data () {
            return {
                loaded: false,
                staff: {},
            };
        },

        mounted () {
            this.getStaff(this.$route.params.id).then(staff => {
                this.staff  = staff;
                this.loaded = true;
            });
        },

        methods: {
            handleSubmit (data) {
                this.updateStaff(this.staff.id, data).then(_ => this.$router.go(-1));
            },
        },
    };
</script>
