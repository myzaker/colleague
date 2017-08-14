<template>
    <div>
        <detail-box
                :department="department"
                :currentGroup="currentGroup"
                @department-updated="load"
        ></detail-box>

        <router-link class="card-list-item"
                     v-for="staff in staffList"
                     :key="staff.id"
                     :to="'/staff/' + staff.id">
            <staff-card :staff="buildStaff(staff)"/>
        </router-link>

        <add-button-card
                v-if="auth.is_admin"
                @click.native="$router.push('/staff/create?department='+department.id)"
        ></add-button-card>
    </div>
</template>


<script>
    import Administration from '../../mixins/administration';
    import Department from '../../mixins/department';
    import AccessLog from '../../mixins/accessLog';
    import Form from './mixins/form';

    import DetailBox from './partials/DetailBox.vue';
    import StaffCard from './partials/StaffCard.vue';

    export default {
        mixins: [Administration, Department, AccessLog, Form],

        components: {DetailBox, StaffCard},

        data () {
            return {
                department: {},
                currentGroup: null,
            };
        },

        watch: {
            '$route' (to) {
                this.load();
            },
        },

        computed: {
            staffList () {
                const department = this.department;

                return this.currentGroup
                    ? (department.group ? department.group.staff : [])
                    : department.staff;
            },
        },

        mounted () {
            this.load();
        },

        methods: {
            load () {
                const department = this.$route.params.id;
                const group      = this.$route.query.group;

                this.currentGroup = group ? group : null;

                (group
                        ? this.getDepartmentGroup(department, group)
                        : this.getDepartment(department)
                ).then(department => {
                    this.department = department;

                    group
                        ? this.logAccession('group', group, 'page')
                        : this.logAccession('department', this.department.id, 'page');
                });
            },

            buildStaff (staff) {
                let groupId = staff.group_id;

                if (groupId) {
                    staff.group = _.find(this.department.groups, {id: groupId});
                }

                return staff;
            },
        },
    };
</script>
