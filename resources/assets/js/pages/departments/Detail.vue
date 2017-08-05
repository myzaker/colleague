<template>
    <div>
        <div id="department">
            <h1 slot="header">
                {{department.name}}
            </h1>

            {{department.description}}
        </div>

        <router-link class="card-list"
                     v-for="staff in staff"
                     :key="staff.id"
                     :to="'/staffs/' + staff.id">
            <el-card>
                <small>{{staff.title}}</small>
                {{staff.name}}
            </el-card>
        </router-link>
    </div>
</template>

<style>
    h1 {
        margin: 0;
        font-weight: normal;
    }

    #department {
        margin-bottom: 2em;
        text-align: center;
    }
</style>

<script>
    export default {
        data () {
            return {
                department: {},
                staff: [],
            };
        },

        mounted () {
            const url = laroute.route('departments.show', {department: this.$route.params.id});

            axios.get(url).then((response) => {
                this.department = response.data.department;
                this.staff      = response.data.staff;
            });
        },
    };
</script>
