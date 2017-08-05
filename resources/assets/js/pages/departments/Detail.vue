<template>
    <div>
        <div id="detail-box">
            <h1 slot="header">
                {{department.name}}
            </h1>

            {{department.description}}
        </div>

        <router-link class="card-list"
                     v-for="staff in staff"
                     :key="staff.id"
                     :to="'/staff/' + staff.id">
            <el-card>
                <small>{{staff.title}}</small>
                {{staff.name}}
            </el-card>
        </router-link>
    </div>
</template>

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
