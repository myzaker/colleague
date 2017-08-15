<template>
    <el-card id="profile-card">
        <div slot="header">
            职员资料卡

            <el-button type="primary" size="small" @click="$emit('submit',form)">保存</el-button>
        </div>

        <el-form label-width="5em"
                 :model="form">
            <el-collapse v-model="activeCollapseItems">
                <el-collapse-item title="部门信息" name="work">
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

                    <el-form-item label="职位">
                        <el-input v-model="form.job"></el-input>
                    </el-form-item>

                    <el-form-item label="管理职务">
                        <el-input v-model="form.position" placeholder="无"></el-input>
                    </el-form-item>

                    <el-form-item label="职责">
                        <el-input v-model="form.duty" placeholder="无"></el-input>
                    </el-form-item>
                </el-collapse-item>

                <el-collapse-item title="个人信息" name="personal">
                    <el-form-item label="姓名">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>

                    <el-form-item label="性别">
                        <el-radio-group v-model="form.gender">
                            <el-radio label="male">男</el-radio>
                            <el-radio label="female">女</el-radio>
                        </el-radio-group>
                    </el-form-item>

                    <el-form-item label="城市">
                        <el-input v-model="form.city" placeholder="未知"></el-input>
                    </el-form-item>

                    <el-form-item label="工作邮箱">
                        <el-input v-model="form.email"></el-input>
                    </el-form-item>
                </el-collapse-item>
            </el-collapse>
        </el-form>
    </el-card>
</template>

<style lang="less">
    #profile-card {
        .el-card__header button {
            float: right;
        }

        .el-card__body {
            padding: 0;
        }

        .el-form-item {
            &:first-of-type {
                margin-top: 5px;
            }

            &:last-of-type {
                margin-bottom: 5px;
            }
        }
    }
</style>

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
                activeCollapseItems: ['work', 'personal'],
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
