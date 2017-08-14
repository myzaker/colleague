<template>
    <staff-form
            :departments="departments"
            :currentDepartmentId="this.$route.query.department"
            @submit="handleSubmit">
    </staff-form>
</template>

<script>
    import Form from './mixins/form';

    export default {
        mixins: [Form],

        methods: {
            handleSubmit (data) {
                this.createStaff(data).then(_ => this.$router.go(-1));
            },
        },
    };
</script>
