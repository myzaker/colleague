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

        <a class="card-list"
           href="javascript:void(0)"
           @click="dialogFormVisible = true">
            <el-card>
                <i class="el-icon-plus"></i>
            </el-card>
        </a>

        <el-dialog title="添加部门" :visible.sync="dialogFormVisible">
            <my-form @success="loadDepartments"
                     @close="dialogFormVisible=false"/>
        </el-dialog>
    </div>
</template>

<script>
    import MyForm from './Form.vue';

    export default {
        components: {MyForm},

        data () {
            return {
                department: [],
                dialogFormVisible: false,
            };
        },

        mounted () {
            this.loadDepartments();
        },

        methods: {
            loadDepartments () {
                axios.get(laroute.route('departments.index')).then((response) => {
                    this.department = response.data;
                });
            },
        },
    };
</script>
