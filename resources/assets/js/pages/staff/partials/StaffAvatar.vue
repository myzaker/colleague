<template>
    <div>
        <div
                v-if="avatar"
                class="image-wrapper"
                :style="avatarStyle"
        ></div>

        <identicon
                v-else
                :string="identicon"
        ></identicon>
    </div>
</template>

<style lang="less" scoped>
    .image-wrapper {
        height: 100%;
        width: 100%;
        background-size: cover;
    }
</style>

<script>
    export default {
        props: [
            'avatar',
            'identicon',
        ],

        computed: {
            avatarStyle () {
                return {
                    backgroundImage: `url(${this.avatar})`,
                };
            },
        },
    };
</script>