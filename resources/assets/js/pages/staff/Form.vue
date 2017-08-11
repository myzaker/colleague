<template>
    <div>
        <el-form :model="form">
            <el-form-item label="部门"
                          v-if="!department">
                <el-select v-model="form.department_id"
                           @change="loadGroups">
                    <el-option
                            v-for="department in departments"
                            :label="department.name"
                            :key="department.id"
                            :value="department.id">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="分组">
                <el-select v-model="form.group_id">
                    <el-option
                            v-for="group in groups"
                            :label="group.name"
                            :key="group.id"
                            :value="group.id">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item label="头衔">
                <el-input v-model="form.job"></el-input>
            </el-form-item>

            <el-form-item label="邮箱">
                <el-input v-model="form.email"></el-input>
            </el-form-item>

            <el-form-item label="职责">
                <el-input v-model="form.duty"></el-input>
            </el-form-item>
        </el-form>

        <div slot="footer">
            <el-button @click="handleSubmit">确定</el-button>
        </div>
    </div>
</template>

<style>
    .el-select {
        width: 100%;
    }
</style>

<script>
    export default {
        props: [
            'data',
            'department',
        ],

        data () {
            return {
                departments: [],
                groups: [],
                form: {
                    department_id: null,
                    group_id: null,
                    name: '',
                    job: '',
                    email: '',
                    duty: '',
                },
            };
        },

        mounted () {
            if (this.department) {
                this.form.department_id = this.department;

                this.loadGroups();
            }
            else
                this.loadDepartments();

            if (this.data) {
                // Deep clone
                this.form = JSON.parse(JSON.stringify(this.data));
            }
        },

        methods: {
            loadDepartments () {
                axios.get(laroute.route('departments.index')).then((response) => {
                    this.departments = response.data;
                });
            },

            loadGroups () {
                const url = laroute.route('departments.groups.index', {
                    department: this.form.department_id,
                });

                axios.get(url).then((response) => {
                    this.groups = response.data;
                });
            },

            handleSubmit () {
                let promise = this.data
                    ? axios.put(laroute.route('staff.update', {staff: this.data.id}), this.form)
                    : axios.post(laroute.route('staff.store'), this.form);

                promise.then((response) => {
                    this.$emit('success');
                    this.$emit('close');
                });
            },
        },
    };
</script>
