<template>
    <el-form ref="form"
             label-width="4em"
             :model="form"
             :rules="rules">
        <el-form-item prop="name" label="名称">
            <el-input v-model="form.name"></el-input>
        </el-form-item>

        <el-form-item prop="description" label="描述">
            <el-input
                    type="textarea"
                    :autosize="{minRows: 2, maxRows: 5}"
                    v-model="form.description"
            ></el-input>
        </el-form-item>
        <el-form-item>
            <el-button @click="handleSubmit">确定</el-button>
        </el-form-item>
    </el-form>
</template>

<style>
    .el-form-item:last-of-type {
        margin-bottom: 0;
    }
</style>

<script>
    import Department from '../../../mixins/department';

    export default {
        mixins: [Department],

        props: ['data'],

        data () {
            return {
                form: {
                    name: '',
                    description: '',
                },
                rules: {
                    name: [{required: true, message: '请输入部门名称', trigger: 'blur'}],
                },
            };
        },

        mounted () {
            if (this.data) {
                this.form.name        = this.data.name;
                this.form.description = this.data.description;
            }
        },

        methods: {
            handleSubmit () {
                this.$refs.form.validate((valid) => {
                    if (!valid)
                        return false;

                    (this.data
                            ? this.updateDepartment(this.data.id, this.form)
                            : this.createDepartment(this.form)
                    ).then(response => {
                        this.$emit('success');
                        this.$emit('close');
                    });
                });
            },
        },
    };
</script>
