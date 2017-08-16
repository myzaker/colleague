<template>
    <el-upload
            id="uploader"
            action="http://up.imgapi.com"
            :data="params"
            :show-file-list="false"
            :on-success="handleUploadSuccess">
        <img v-if="imageUrl"
             :src="imageUrl">

        <i v-else
           class="el-icon-plus"></i>
    </el-upload>
</template>

<style lang="less">
    #uploader {
        i {
            font-size: 28px;
            color: #8c939d;
            width: 178px;
            height: 178px;
            line-height: 178px;
            text-align: center;
        }

        img {
            width: 178px;
            height: 178px;
            display: block;
        }

        .el-upload {
            border: 1px dashed #d9d9d9;
            border-radius: 6px;
            cursor: pointer;
            overflow: hidden;

            &:hover {
                border-color: #fb4747;
            }
        }
    }
</style>

<script>
    export default {
        props: ['value'],

        data () {
            const token = '20b611a62a4357df384140459a8aa84b47afac46:XFRdG43KRcPuezzFwEJ0P9rP-vw=:eyJkZWFkbGluZSI6MTQ4OTEzODM2MCwiYWN0aW9uIjoiZ2V0IiwidWlkIjoiNTAxMDI0IiwiYWlkIjoiMTA0MzM3MiIsImZyb20iOiJmaWxlIn0=';

            return {
                params: {Token: token},
                imageUrl: '',
            };
        },

        methods: {
            handleUploadSuccess (res, file) {
                this.imageUrl = URL.createObjectURL(file.raw);

                this.$emit('input', res.s_url);
            },
        },
    };
</script>
