<template>
    <div>
        <router-link class="card-list"
                     v-for="department in departments"
                     :key="department.id"
                     :to="'/departments/' + department.id">
            <el-card>
                {{department.name}}
            </el-card>
        </router-link>

        <add-card-button @click.native="dialogFormVisible = true"/>

        <el-dialog title="添加部门"
                   :visible.sync="dialogFormVisible">
            <my-form @success="loadDepartments"
                     @close="dialogFormVisible = false"/>
        </el-dialog>
    </div>
</template>

<script>
    import Form from './mixins/form';

    export default {
        mixins: [Form],

        data () {
            return {
                departments: [],
            };
        },

        mounted () {
            this.loadDepartments();
        },

        methods: {
            loadDepartments () {
                axios.get(laroute.route('departments.index')).then((response) => {
                    this.departments = response.data;
                });
            },
        },
    };
</script>
