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
                axios.get(route('search'), {params: {query: queryString}}).then(response => {
                    const typeMap = {
                        staff: {name: '职员', route: item => '/staff/' + item.id},
                        group: {name: '分组', route: item => `departments/${item.department_id}?group=${item.id}`},
                    };

                    let result = [];

                    for (let type in typeMap) {
                        if (!response.data[type])
                            continue;

                        for (let item of response.data[type]) {
                            const mapItem = typeMap[type];

                            result.push({
                                type,
                                address: item.id,
                                value: `[${mapItem.name}] ${item.name}`,
                                route: mapItem.route(item),
                            });
                        }
                    }

                    callback(result);
                });
            },

            handleSelect (item) {
                this.query = '';

                vue.$emit('log-access', {
                    type: 'search',
                    origin: item.type,
                    object: item.address,
                });

                this.$router.push(item.route);
            },
        },
    };
</script>
