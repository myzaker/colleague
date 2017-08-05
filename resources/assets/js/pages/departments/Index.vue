<template>
    <div>
        <router-link class="card-list"
                     v-for="department in department"
                     :key="department.id"
                     :to="'/departments/' + department.id">
            <el-card>
                {{department.name}}
            </el-card>
        </router-link>
    </div>
</template>

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
