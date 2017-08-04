<template>
    <div>
        <router-link v-for="department in department"
                     :key="department.id"
                     :to="'/departments/' + department.id">
            <el-card>
                {{department.name}}
            </el-card>
        </router-link>
    </div>
</template>

<style>
    a {
        text-decoration: none;
        color: #3b3b3b;
    }

    .el-card {
        margin-bottom: 1em;
        font-size: 1.5em;
        text-align: center;
    }
</style>

<script>
    export default {
        data () {
            return {
                department: [],
            };
        },

        mounted () {
            axios.get(laroute.route('departments.index')).then((response) => {
                this.department = response.data;
            });
        },
    };
</script>
