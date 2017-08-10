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
                @click.native="dialogFormVisible = true"
                v-if="auth.is_admin">
        </add-button-card>

        <el-dialog title="添加部门"
                   :visible.sync="dialogFormVisible">
            <my-form @success="loadDepartments"
                     @close="dialogFormVisible = false"/>
        </el-dialog>
    </div>
</template>

<script>
    import Form from './mixins/form';
    import Administration from '../../mixins/administration';

    export default {
        mixins: [Form, Administration],

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
