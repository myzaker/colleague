<template>
    <div>
        <router-link class="card-list-item"
                     style="text-align: center"
                     v-for="department in departments"
                     :key="department.id"
                     :to="'/departments/' + department.id">
            <el-card>
                {{department.name}}
            </el-card>
        </router-link>

        <add-button-card
                @click.native="departmentFormVisible = true"
                v-if="auth.is_admin">
        </add-button-card>

        <el-dialog title="添加部门"
                   :visible.sync="departmentFormVisible">
            <department-form
                    @success="load"
                    @close="departmentFormVisible = false">
            </department-form>
        </el-dialog>
    </div>
</template>

<script>
    import Administration from '../../mixins/administration';
    import Department from '../../mixins/department';
    import Form from './mixins/form';

    export default {
        mixins: [Form, Administration, Department],

        data () {
            return {
                departments: [],
            };
        },

        mounted () {
            this.load();
        },

        methods: {
            load () {
                this.loadDepartments().then(departments => this.departments = departments);
            },
        },
    };
</script>
