<!DOCTYPE html>
<!-- 
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ config('app.locale') }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Popcake | User Login </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!! Html::style('https://fonts.googleapis.com/css') !!}
        {!! Html::style(url('/public/assets/global/plugins/font-awesome/css/font-awesome.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/bootstrap/css/bootstrap.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/uniform/css/uniform.default.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')) !!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style(url('/public/assets/global/css/components.min.css')) !!}
        {!! Html::style(url('/public/assets/global/css/plugins.min.css')) !!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        {!! Html::style(url('/public/assets/pages/css/login-2.min.css')) !!}
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="/">
                <img src="{{ url('/public/assets/pages/img/logo-big-white.png')}}" style="height: 50px;" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
         @yield('content');
        </div>
        <div class="copyright hide"> 2017© Procoop. </div>
        <!-- END LOGIN -->
    
        <!-- BEGIN CORE PLUGINS -->
        {!! HTML::script(url('/public/assets/global/plugins/jquery.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/bootstrap/js/bootstrap.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/js.cookie.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/jquery.blockui.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/uniform/jquery.uniform.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); !!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! HTML::script(url('/public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/jquery-validation/js/additional-methods.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/select2/js/select2.full.min.js')); !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! HTML::script(url('/public/assets/global/scripts/app.min.js')); !!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {!! HTML::script(url('/public/assets/pages/scripts/login.min.js')); !!}
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
</html>