<template>
    <el-card>
        <img class="avatar" :src="`https://github.com/identicons/${staff.id}.png`">

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
    export default {
        props: ['staff'],
    };
</script>
