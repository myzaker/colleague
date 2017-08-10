<template>
    <div>
        <div id="detail-box">
            <h1 slot="header">
                {{department.name}}
            </h1>

            <p>{{department.description}}</p>

            <el-button type="text"
                       href="javascript:void(0)"
                       @click="dialogFormVisible = true"
                       v-if="auth.is_admin">
                修改部门信息
            </el-button>
        </div>

        <router-link class="card-list"
                     v-for="staff in staff"
                     :key="staff.id"
                     :to="'/staff/' + staff.id">
            <el-card>
                <small class="muted-text">
                    {{staff.title}}
                </small>
                <br>
                {{staff.name}}
            </el-card>
        </router-link>

        <add-card-button
                @click.native="staffFormVisible = true"
                v-if="auth.is_admin">
        </add-card-button>

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

<script>
    import Form from './mixins/form';
    import Administration from '../../mixins/administration';
    import StaffForm from '../staff/Form.vue';

    export default {
        mixins: [Form, Administration],

        components: {StaffForm},

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
                });
            },
        },
    };
</script>
