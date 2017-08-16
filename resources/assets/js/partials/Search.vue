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
                axios.get(laroute.route('search'), {params: {query: queryString}}).then(response => {
                    const typeMap = {
                        staff: '职员',
                        group: '分组',
                    };

                    let result = [];

                    for (let type in typeMap) {
                        if (response.data[type])
                            for (let item of response.data[type]) {
                                result.push({
                                    address: item.id,
                                    value: `[${typeMap[type]}] ${item.name}`,
                                });
                            }
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
