<template>
    <div id="group-tags">
        <el-tag
                v-for="group in groups"
                :key="group.id"
                :type="current == group.id ? 'danger':null"
                @click.native="switchGroup(group.id)">
            {{group.name}}
        </el-tag>

        <template v-if="auth.is_admin">
            <el-input
                    ref="newTagInput"
                    size="mini"
                    v-if="inputVisible"
                    v-model="newTagName"
                    @keyup.enter.native="handleInputConfirm"
                    @blur="handleInputConfirm">
            </el-input>

            <el-button v-else
                       size="small"
                       @click="showInput">
                添加分组
            </el-button>
        </template>
    </div>
</template>

<style>
    .el-tag {
        cursor: pointer;
        margin-right: 10px;
        margin-bottom: 5px;
        font-size: 14px;
    }

    #group-tags {
        margin-bottom: -5px;
    }
</style>

<script>
    import Administration from '../../mixins/administration';

    export default {
        mixins: [Administration],

        props: ['department', 'groups', 'current'],

        data () {
            return {
                inputVisible: false,
                newTagName: '',
            };
        },

        methods: {
            showInput () {
                this.inputVisible = true;

                this.$nextTick(_ => {
                    this.$refs.newTagInput.$refs.input.focus();
                });
            },

            handleInputConfirm () {
                const name = this.newTagName;

                if (name) {
                    const department = this.department.id;
                    const url        = laroute.route('departments.groups.store', {department});
                    const data       = {
                        department_id: department,
                        name,
                    };

                    axios.post(url, data).then((response) => {
                        this.groups.push(response.data);
                    });
                }

                this.inputVisible = false;
                this.newTagName   = '';
            },

            switchGroup (id) {
                let to = {path: '/departments/' + this.department.id};

                if (this.current !== id)
                    to.query = {group: id};

                this.$router.push(to);
            },
        },
    };
</script>
