<template>
    <el-autocomplete
            placeholder="找人"
            v-model="query"
            :fetch-suggestions="search"
            @select="handleSelect"
    ></el-autocomplete>
</template>

<style lang="less" scoped>
    .el-autocomplete {
        display: inherit;
        margin-bottom: 1.5em;

        input, input::placeholder {
            text-align: center;
        }
    }

    .el-autocomplete-suggestion__list {
        text-align: center;
    }
</style>

<script>
    export default {
        data () {
            return {
                query: '',
            };
        },

        methods: {
            search (queryString, callback) {
                axios.get(laroute.route('staff.search'), {params: {query: queryString}}).then(response => {
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
                this.query = '';

                this.$router.push(`/staff/${item.address}?from=search`);
            },
        },
    };
</script>
