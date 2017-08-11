<template>
    <div>
        <div id="detail-box" style="text-align: center">
            <h1 slot="header">
                {{department.name}}
            </h1>

            <group-tags
                    :department="department"
                    :groups="department.groups">
            </group-tags>

            <p class="muted-text">{{department.description}}</p>

            <el-button type="text"
                       href="javascript:void(0)"
                       @click="dialogFormVisible = true"
                       v-if="auth.is_admin">
                修改部门信息
            </el-button>
        </div>

        <router-link class="card-list-item"
                     v-for="staff in staff"
                     :key="staff.id"
                     :to="'/staff/' + staff.id">
            <el-card>
                <div class="wrapper">
                    <img class="card-avatar" :src="`https://github.com/identicons/${staff.id}.png`">

                    <div id="profile">
                        <small class="muted-text">
                            {{staff.title}}

                            <template v-if="staff.group_name">
                                （{{staff.group_name}}）
                            </template>
                        </small>
                        <br>
                        {{staff.name}}
                    </div>
                </div>
            </el-card>
        </router-link>

        <add-button-card
                @click.native="staffFormVisible = true"
                v-if="auth.is_admin">
        </add-button-card>

        <el-dialog title="修改部门信息"
                   :visible.sync="dialogFormVisible">
            <my-form
                    :data="department"
                    @success="loadData"
                    @close="dialogFormVisible = false">
            </my-form>
        </el-dialog>

        <el-dialog title="添加人员"
                   :visible.sync="staffFormVisible">
            <staff-form
                    :department="department.id"
                    @success="loadData"
                    @close="staffFormVisible = false">
            </staff-form>
        </el-dialog>
    </div>
</template>

<style lang="less" scoped>
    .el-card:not(.add-button-card) .wrapper {
        display: table;
    }

    .card-avatar {
        width: 100px;
    }

    #profile {
        display: table-cell;
        vertical-align: middle;
        height: 100px;

        p:first-of-type {
            margin-top: 0;
        }
    }
</style>

<script>
    import Form from './mixins/form';
    import Administration from '../../mixins/administration';
    import AccessLog from '../../mixins/accessLog';

    import GroupTags from './GroupTags.vue';
    import StaffForm from '../staff/Form.vue';

    export default {
        mixins: [Form, Administration, AccessLog],

        components: {GroupTags, StaffForm},

        data () {
            return {
                department: {},
                staff: [],
                staffFormVisible: false,
            };
        },

        mounted () {
            this.loadData();
        },

        methods: {
            loadData () {
                const url = laroute.route('departments.show', {department: this.$route.params.id});

                axios.get(url).then((response) => {
                    this.department = response.data.department;
                    this.staff      = response.data.staff;

                    this.logAccession('department', this.department.id, 'page');
                });
            },
        },
    };
</script>
