<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Procoop | Registration Successful</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
       
        {!! Html::style(url('/public/assets/global/plugins/font-awesome/css/font-awesome.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/bootstrap/css/bootstrap.min.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/uniform/css/uniform.default.css')) !!}
        {!! Html::style(url('/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')) !!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style(url('/public/assets/global/css/components.min.css"')) !!}
        {!! Html::style(url('/public/assets/global/css/plugins.min.css')) !!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        {!! Html::style(url('/public/assets/pages/css/coming-soon.min.css')) !!}
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 coming-soon-header">
                    <a class="brand" href="index.html">
                        <img src="{{url('public/assets/pages/img/logo-big-white.png')}}" alt="logo" /> </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 coming-soon-content">
                    <h1>
                    @if ($message = Session::get('success'))
                        {{ $message }} 
                        
                        @endif



                    @if (isset($success))
                        {{ $success }}
                        @else
                       
                        @endif
                        </h1>
                    
                    <br>
                
                </div>
               
            </div>
            <!--/end row-->
           
        </div>
        <!--[if lt IE 9]>

<![endif]-->
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
        {!! HTML::script(url('/public/assets/global/plugins/countdown/jquery.countdown.min.js')); !!}
        {!! HTML::script(url('/public/assets/global/plugins/backstretch/jquery.backstretch.min.js')); !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! HTML::script(url('/public/assets/global/scripts/app.min.js')); !!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>

<script type="text/javascript">
	
var ComingSoon=function(){return{init:function(){var e=new Date;e=new Date(e.getFullYear()+1,0,26),$("#defaultCountdown").countdown({until:e}),$("#year").text(e.getFullYear()),$.backstretch(["{{url('/public/assets/pages/media/bg/1.jpg')}}","{{url('/public/assets/pages/media/bg/2.jpg')}}","{{url('/public/assets/pages/media/bg/3.jpg')}}","{{url('/public/assets/pages/media/bg/4.jpg')}}"],{fade:1e3,duration:1e4})}}}();jQuery(document).ready(function(){ComingSoon.init()});


</script>