<template>
    <div id="detail-box">
        <el-card>
            <img class="card-avatar" :src="`https://github.com/identicons/${staff.id}.png`">

            <div id="profile">
                <h1>
                    {{staff.name}}
                    <small class="muted-text"
                           v-if="staff.position">
                        {{staff.position}}
                    </small>

                    <small>
                        <gender-symbol :gender="staff.gender"/>
                    </small>
                </h1>

                <p>
                    <span class="muted-text">
                        <small v-if="staff.city">来自{{staff.city}}</small><br>
                        {{department.name}}
                        |
                        <template v-if="staff.group_name">
                            {{staff.group_name}}
                            |
                        </template>
                        {{staff.job}}
                    </span>

                    <br>
                    {{staff.duty}}
                </p>

                <P>
                    <el-button type="text" :href="'mailto:' + staff.email">{{staff.email}}</el-button>
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
    import AccessLog from '../../mixins/accessLog';

    export default {
        mixins: [Administration, AccessLog],
        components: {MyForm},

        data () {
            return {
                department: {},
                staff: {},
                dialogFormVisible: false,
            };
        },

        watch: {
            '$route' (to) {
                this.loadData();
            },
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

                    this.logAccession(
                        'staff',
                        this.staff.id,
                        this.$route.query.from ? 'search' : 'page',
                    );
                });
            },
        },
    };
</script>
