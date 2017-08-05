<template>
    <div id="detail-box">
        {{department.name}}

        <h1>
            <small>{{staff.title}}</small>
            {{staff.name}}
        </h1>

        <p>{{staff.duty}}</p>

        <el-button type="text" :href="'mailto:' + staff.email">{{staff.email}}</el-button>
        <el-button type="text" :href="'tel:' + staff.phone">{{staff.phone}}</el-button>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                department: {},
                staff: {},
            };
        },

        mounted () {
            const url = laroute.route('staff.show', {staff: this.$route.params.id});

            axios.get(url).then((response) => {
                this.department = response.data.department;
                this.staff      = response.data.staff;
            });
        },
    };
</script>
