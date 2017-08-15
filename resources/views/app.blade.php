<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Styles -->
        <link href="//cdn.bootcss.com/element-ui/1.4.2/theme-default/index.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div id="app">
        <router-link id="brand" to="/">
            <img src="http://zkres.myzaker.com/static/zaker_web2/img/logo.png?v=20170726">
        </router-link>

        <el-row type="flex" justify="center">
            <el-col style="max-width: 768px">
                <search></search>

                <router-view></router-view>
            </el-col>
        </el-row>
    </div>

    <!-- Scripts -->
    @if('production'==config('app.env'))
        <script src="//cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
        <script src="//cdn.bootcss.com/vuex/2.3.1/vuex.min.js"></script>
        <script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>
        <script src="//cdn.bootcss.com/axios/0.16.2/axios.min.js"></script>
    @else
        <script src="//cdn.bootcss.com/vue/2.4.2/vue.js"></script>
        <script src="//cdn.bootcss.com/vuex/2.3.1/vuex.js"></script>
        <script src="//cdn.bootcss.com/vue-router/2.7.0/vue-router.js"></script>
        <script src="//cdn.bootcss.com/axios/0.16.2/axios.js"></script>
        <script>window.basePath = '{{env('APP_SPA_BASE')}}';</script>
    @endif

    <script src="//cdn.bootcss.com/element-ui/1.4.2/index.js"></script>
    <script src="{{ asset('js/laroute.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
