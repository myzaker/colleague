import Department from '../../../mixins/department';
import Staff from '../../../mixins/staff';

import StaffForm from '../partials/Form.vue';

export default {
    mixins: [Department, Staff],
    components: {StaffForm},

    data () {
        return {
            departments: [],
        };
    },

    mounted () {
        this.loadDepartments().then(departments => this.departments = departments);
    },
};
