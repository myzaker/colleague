<template>
    <div id="detail-box">
        <el-card>
            <img class="card-avatar" :src="`https://github.com/identicons/${staff.id}.png`">

            <div id="profile">
                <h1>{{staff.name}}</h1>

                <p>
                    <span class="muted-text">
                    {{department.name}} | {{staff.title}}
                    </span>

                    <br>
                    {{staff.duty}}
                </p>

                <P>
                    <el-button type="text" :href="'mailto:' + staff.email">{{staff.email}}</el-button>
                    <el-button type="text" :href="'tel:' + staff.phone">{{staff.phone}}</el-button>
                </P>
            </div>
        </el-card>

        <el-button
                id="modify"
                @click="dialogFormVisible = true"
                v-if="auth.is_admin || auth.id==staff.id">
            修改人员信息
        </el-button>

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

<style lang="less" scoped>
    .el-card {
        padding-bottom: 1em;
    }

    .card-avatar {
        width: 150px;
    }

    #profile {
        float: left;

        p:first-of-type {
            margin-top: 0;
        }

        p:last-of-type {
            margin-bottom: 0;
        }
    }

    #modify {
        display: block;
        margin: 1em auto;
    }
</style>

<script>
    import MyForm from './Form.vue';
    import Administration from '../../mixins/administration';

    export default {
        mixins: [Administration],
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

        watch: {
            '$route' (to) {
                this.loadData();
            },
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
