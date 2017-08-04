<template>
    <el-card>
        <h1 slot="header">
            {{department.name}}
        </h1>

        {{department.description}}
    </el-card>
</template>

<style>
    h1 {
        margin: 0;
        font-weight: normal;
        text-align: center;
    }
</style>

<script>
    export default {
        data () {
            return {
                department: {},
            };
        },

        mounted () {
            const url = laroute.route('departments.show', {department: this.$route.params.id});

            axios.get(url).then((response) => {
                this.department = response.data.department;
            });
        },
    };
</script>
