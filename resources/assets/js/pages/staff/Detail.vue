<template>
    <div id="detail-box">
        {{department.name}}

        <h1>
            <small>{{staff.title}}</small>
            {{staff.name}}
        </h1>

        <p>{{staff.duty}}</p>

        <P>
            <el-button type="text" :href="'mailto:' + staff.email">{{staff.email}}</el-button>
            <el-button type="text" :href="'tel:' + staff.phone">{{staff.phone}}</el-button>
        </P>

        <el-button @click="dialogFormVisible = true">修改人员信息</el-button>

        <el-dialog title="修改人员信息"
                   :visible.sync="dialogFormVisible">
            <my-form
                    :data="staff"
                    @success="loadData"
                    @close="dialogFormVisible = false">
            </my-form>
        </el-dialog>
    </div>
</template>

<script>
    import MyForm from './Form.vue';

    export default {
        components: {MyForm},

        data () {
            return {
                department: {},
                staff: {},
                dialogFormVisible: false,
            };
        },

        mounted () {
            this.loadData();
        },

        methods: {
            loadData () {
                const url = laroute.route('staff.show', {staff: this.$route.params.id});

                axios.get(url).then((response) => {
                    this.department = response.data.department;
                    this.staff      = response.data.staff;
                });
            },
        },
    };
</script>
