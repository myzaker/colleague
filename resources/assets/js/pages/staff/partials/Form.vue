<template>
    <el-card>
        <div slot="header">
            职员资料卡
        </div>

        <el-form label-width="5em"
                 :model="form">
            <el-form-item label="部门"
                          v-if="'edit'==mode">
                <el-select v-model="form.department_id"
                           @change="form.group_id = null,onDepartmentChanged()">
                    <el-option
                            v-for="department in departments"
                            :label="department.name"
                            :key="department.id"
                            :value="department.id">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="分组">
                <el-select v-model="form.group_id" placeholder="无" clearable>
                    <el-option
                            v-for="group in groups"
                            :label="group.name"
                            :key="group.id"
                            :value="group.id">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="姓名">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item label="性别">
                <el-select v-model="form.gender">
                    <el-option label="男" value="male"></el-option>
                    <el-option label="女" value="female"></el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="城市">
                <el-input v-model="form.city" placeholder="未知"></el-input>
            </el-form-item>

            <el-form-item label="职位">
                <el-input v-model="form.job"></el-input>
            </el-form-item>

            <el-form-item label="管理职务">
                <el-input v-model="form.position" placeholder="无"></el-input>
            </el-form-item>

            <el-form-item label="邮箱">
                <el-input v-model="form.email"></el-input>
            </el-form-item>

            <el-form-item label="职责">
                <el-input v-model="form.duty" placeholder="无"></el-input>
            </el-form-item>

            <el-form-item>
                <el-button @click="$emit('submit')">确定</el-button>
            </el-form-item>
        </el-form>
    </el-card>
</template>

<script>
    import Department from '../../../mixins/department';

    export default {
        mixins: [Department],

        props: [
            'mode',
            'departments',
            'currentDepartmentId',
            'staff',
        ],

        data () {
            return {
                groups: [],
                form: {
                    department_id: null,
                    group_id: null,
                    name: '',
                    gender: '',
                    city: '',
                    job: '',
                    position: '',
                    email: '',
                    duty: '',
                },
            };
        },

        mounted () {
            this.form.department_id = this.currentDepartmentId;

            if (this.staff)
                this.$nextTick(() => _.merge(this.form, this.staff));
            else
                this.onDepartmentChanged();
        },

        methods: {
            onDepartmentChanged () {
                this.loadDepartmentGroups(this.form.department_id).then(groups => this.groups = groups);
            },
        },
    };
</script>
