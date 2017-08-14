<template>
    <div id="detail-box">
        <h1>{{department.name}}</h1>

        <group-tags
                :department="department"
                :groups="department.groups"
                :current="currentGroup">
        </group-tags>

        <p class="muted-text">{{department.description}}</p>

        <el-button type="text"
                   v-if="auth.is_admin"
                   @click="departmentFormVisible = true">
            修改部门信息
        </el-button>

        <el-dialog title="修改部门信息"
                   :visible.sync="departmentFormVisible">
            <department-form
                    :data="department"
                    @success="$emit('department-updated')"
                    @close="departmentFormVisible = false">
            </department-form>
        </el-dialog>
    </div>
</template>

<style scoped>
    #detail-box {
        text-align: center;
    }
</style>

<script>
    import Administration from '../../../mixins/administration';
    import Form from './../mixins/form';

    import GroupTags from './GroupTags.vue';

    export default {
        mixins: [Administration, Form],
        components: {GroupTags},

        props: [
            'department',
            'currentGroup',
        ],
    };
</script>
