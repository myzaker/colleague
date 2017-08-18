<template>
    <el-upload
            id="uploader"
            action="http://up.imgapi.com"
            :data="params"
            :show-file-list="false"
            :on-progress="handleUploadProgress"
            :on-success="handleUploadSuccess">
        <img v-if="value" :src="value">
        <div v-else-if="showPlus==false" class="upload-progress">{{percent}}</div>
        <i v-else class="el-icon-plus"></i>
    </el-upload>
</template>

<style lang="less">
    @size: 100px;

    #uploader {
        i, .upload-progress {
            font-size: 28px;
            color: #8c939d;
            width: @size;
            height: @size;
            line-height: @size;
            text-align: center;
        }

        .upload-progress {
            font-size: 10px;
        }

        img {
            width: @size;
            height: @size;
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
                percent: '0%',
                showPlus: true,
            };
        },

        methods: {
            handleUploadSuccess (res, file) {
                this.showPlus = true;
                this.$emit('input', res.s_url);
            },
            handleUploadProgress (event, file, fileList) {
                this.showPlus = false;
                this.percent  = Math.round(event.percent) + '%';
            },
        },
    };
</script>
