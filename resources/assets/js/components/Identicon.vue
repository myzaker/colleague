<template>
    <div class="identicon-wrapper">
        <img :src="image">
    </div>
</template>

<style lang="less">
    .identicon-wrapper {
        padding: 1.5%;
        background: #f0f0f0;
        box-sizing: border-box;

        img {
            height: 100%;
            width: 100%;
        }
    }
</style>

<script>
    export default {
        props: ['string'],

        computed: {
            image () {
                return route('identicon', {string: this.string}).toString();
            },
        },
    };
</script>