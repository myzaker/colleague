<template>
    <div>
        <el-form :model="form">
            <el-form-item label="部门"
                          v-if="!department">
                <br>
                <el-select v-model="form.department_id">
                    <el-option
                            v-for="department in departments"
                            :label="department.name"
                            :key="department.id"
                            :value="department.id">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item label="头衔">
                <el-input v-model="form.title"></el-input>
            </el-form-item>

            <el-form-item label="邮箱">
                <el-input v-model="form.email"></el-input>
            </el-form-item>

            <el-form-item label="手机">
                <el-input v-model="form.phone"></el-input>
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
                form: {
                    department_id: null,
                    name: '',
                    title: '',
                    email: '',
                    phone: '',
                    duty: '',
                },
            };
        },

        mounted () {
            if (this.department)
                this.form.department_id = this.department;
            else
                this.loadDepartments();

            if (this.data) {
                this.form.department_id = this.data.department_id;
                this.form.name          = this.data.name;
                this.form.title         = this.data.title;
                this.form.email         = this.data.email;
                this.form.phone         = this.data.phone;
                this.form.duty          = this.data.duty;
            }
        },

        methods: {
            loadDepartments () {
                axios.get(laroute.route('departments.index')).then((response) => {
                    this.departments = response.data;
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
