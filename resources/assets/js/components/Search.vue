<template>
    <el-autocomplete
            placeholder="找人"
            :fetch-suggestions="querySearchAsync"
            @select="handleSelect"
    ></el-autocomplete>
</template>

<style>
    input {
        text-align: center;
    }

    input::placeholder {
        text-align: center;
    }

    .el-autocomplete {
        display: inherit;
        margin-bottom: 2em;
    }
</style>

<script>
    export default {
        methods: {
            querySearchAsync (queryString, callback) {
                axios.get(laroute.route('staff.search'), {params: {query: queryString}}).then((response) => {
                    let result = [];

                    for (let item of response.data) {
                        result.push({
                            address: item.id,
                            value: item.name,
                        });
                    }

                    callback(result);
                });
            },

            handleSelect (item) {
                this.$router.push('/staff/' + item.address);
            },
        },
    };
</script>
