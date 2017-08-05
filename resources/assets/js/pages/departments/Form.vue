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
            <el-button @click="handleSubmit">确 定</el-button>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                form: {
                    name: '',
                    description: '',
                },
            };
        },

        methods: {
            handleSubmit () {
                axios.post(laroute.route('departments.store'), this.form).then((response) => {
                    this.$emit('success');
                    this.$emit('close');
                });
            },
        },
    };
</script>
