<template>
    <el-card>
        <staff-avatar
                class="avatar"
                :avatar="staff.avatar"
                :identicon="staff.email"
        ></staff-avatar>

        <div class="profile">
            <small class="muted-text">
                {{staff.job}}

                <template v-if="staff.group">
                    （{{staff.group.name}}）
                </template>
            </small>

            <br>

            {{staff.name}}
            <small v-if="staff.position">
                {{staff.position}}
            </small>
        </div>
    </el-card>
</template>

<style lang="less" scoped>
    .el-card__body {
        display: table;

        .avatar {
            width: 100px;
            height: 100px;
        }

        .profile {
            display: table-cell;
            vertical-align: middle;
            height: 100px;

            p:first-of-type {
                margin-top: 0;
            }
        }
    }
</style>

<script>
    import StaffAvatar from '../../../partials/StaffAvatar.vue';

    export default {
        components: {StaffAvatar},
        props: ['staff'],
    };
</script>
