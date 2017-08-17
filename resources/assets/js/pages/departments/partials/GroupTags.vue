<template>
    <div id="group-tags">
        <el-tag
                v-for="group in groups"
                :key="group.id"
                :type="current == group.id ? 'danger':null"
                @click.native="switchGroup(group.id)"
                v-accesslog="'group.page.'+group.id">
            {{group.name}}
        </el-tag>

        <template v-if="auth.is_admin">
            <el-popover ref="popover"
                        placement="bottom-end"
                        v-model="showPopover"
                        @show="onPopoverShowed">
                <el-form>
                    <el-form-item label="新分组名" style="margin-bottom: 5px">
                        <el-input
                                ref="newTagInput"
                                v-model="newTagName"
                                @keyup.enter.native="handleInputConfirm"
                                @keyup.esc.native="showPopover=false"
                        ></el-input>
                    </el-form-item>
                </el-form>
            </el-popover>

            <el-button size="small"
                       v-popover:popover>
                添加分组
            </el-button>
        </template>
    </div>
</template>

<style lang="less">
    #group-tags {
        margin-bottom: -5px;

        .el-tag {
            cursor: pointer;
            margin-right: 10px;
            margin-bottom: 5px;
            font-size: 14px;
        }
    }
</style>

<script>
    import Administration from '../../../mixins/administration';
    import Department from '../../../mixins/department';

    export default {
        mixins: [Administration, Department],

        props: ['department', 'groups', 'current'],

        data () {
            return {
                showPopover: false,
                newTagName: '',
            };
        },

        methods: {
            onPopoverShowed () {
                this.$nextTick(_ => this.$refs.newTagInput.$refs.input.focus());
            },

            handleInputConfirm () {
                const name = this.newTagName;

                if (name) {
                    const department = this.department.id;

                    this.createDepartmentGroup(department, {
                        department_id: department,
                        name,
                    }).then(group => this.groups.push(group));
                }

                this.showPopover = false;
                this.newTagName  = '';
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
