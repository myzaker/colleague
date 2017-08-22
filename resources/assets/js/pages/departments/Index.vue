<template>
    <div>
        <draggable v-model="departments"
                   @end="onEnd"
        >
            <router-link class="card-list-item"
                         v-for="department in departments"
                         :key="department.id"
                         :to="'/departments/' + department.id"
                         v-accesslog="'department.page.'+department.id">
                <el-card>
                    {{department.name}}
                    <span class="stat muted-text">{{department.stat}}人</span>
                </el-card>
            </router-link>
        </draggable>

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

<style scoped>
    .stat {
        float: right;
    }

    .card-list-item {
        display: block;
    }
</style>

<script>
    import Administration from '../../mixins/administration';
    import Department from '../../mixins/department';
    import Form from './mixins/form';
    import draggable from 'vuedraggable';

    export default {
        mixins: [Form, Administration, Department],

        components: {
            draggable,
        },

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
                this.loadDepartments().then(departments => {
                    this.departments = departments.sort(function (a, b) {
                        return a.sort-b.sort;
                    });
                });

            },

            onEnd (evt) {
                this.departments.map(function (department, index) {
                    department.sort = index;
                });
                this.update(this.departments);
            },

            update (departments) {
                this.updateDepartmentsSort(departments);
            },
        },
    };
</script>
