<template>
    <span :style="style">{{symbol}}</span>
</template>

<script>
    export default {
        props: ['gender'],

        computed: {
            symbol () {
                const symbol = {
                    'male': '♂',
                    'female': '♀',
                };

                return symbol[this.gender];
            },

            style () {
                const color = {
                    'male': 'blue',
                    'female': 'pink',
                };

                return {color: color[this.gender]};
            },
        },
    };
</script>