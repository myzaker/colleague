<template>
    <div id="detail-box">
        <profile-card :staff="staff"/>

        <el-button
                id="modify-button"
                @click="$router.push(`/staff/${staff.id}/edit`)"
                v-if="auth.is_admin || auth.id==staff.id">
            修改人员信息
        </el-button>
    </div>
</template>

<style lang="less" scoped>
    #modify-button {
        display: block;
        margin: 1em auto;
    }
</style>

<script>
    import Administration from '../../mixins/administration';
    import Staff from '../../mixins/staff';

    import ProfileCard from './partials/ProfileCard.vue';

    export default {
        mixins: [Administration, Staff],
        components: {ProfileCard},

        data () {
            return {
                staff: {},
            };
        },

        watch: {
            '$route' (to) {
                this.load();
            },
        },

        mounted () {
            this.load();
        },

        methods: {
            load () {
                this.getStaff(this.$route.params.id).then(staff => this.staff = staff);
            },
        },
    };
</script>
