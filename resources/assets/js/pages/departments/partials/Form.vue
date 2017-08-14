<template>
    <div>
        <el-form :model="form">
            <el-form-item label="名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item label="描述">
                <el-input
                        type="textarea"
                        :autosize="{minRows: 2, maxRows: 5}"
                        v-model="form.description">
                </el-input>
            </el-form-item>
        </el-form>

        <div slot="footer">
            <el-button @click="handleSubmit">确定</el-button>
        </div>
    </div>
</template>

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
                (this.data
                        ? this.updateDepartment(this.data.id, this.form)
                        : this.createDepartment(this.form)
                ).then(response => {
                    this.$emit('success');
                    this.$emit('close');
                });
            },
        },
    };
</script>
