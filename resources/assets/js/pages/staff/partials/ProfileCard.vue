<template>
    <el-card>
        <staff-avatar
                class="avatar"
                :avatar="staff.avatar"
                :identicon="staff.email"
        ></staff-avatar>

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
                        {{staff.department ? staff.department.name : ''}}
                        |
                        <template v-if="staff.group">
                            {{staff.group.name}}
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
</template>

<style lang="less" scoped>
    .el-card {
        padding-bottom: 1em;
    }

    .avatar {
        width: 174px;
        height: 174px;
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
</style>

<script>
    import StaffAvatar from '../../../partials/StaffAvatar.vue';

    export default {
        components: {StaffAvatar},
        props: ['staff'],
    };
</script>
