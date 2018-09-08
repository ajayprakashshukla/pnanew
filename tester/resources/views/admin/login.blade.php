<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Procoop| Admin Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
        {!! Html::style('public/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('public/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('public/assets/global/plugins/uniform/css/uniform.default.css') !!}
        {!! Html::style('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style('public/assets/global/plugins/select2/css/select2.min.css') !!}
        {!! Html::style('public/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style('public/assets/global/css/components.min.css') !!}
        {!! Html::style('public/assets/global/css/plugins.min.css') !!}
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        {!! Html::style('public/assets/pages/css/login-5.min.css') !!}
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 login-container bs-reset">
                    <img width = "150px" class="login-logo login-6" src="{{url('public/assets/pages/img/logo-big-white.png')}}" />
                    <div class="login-content">
                        <h1>Procoop Admin Login</h1>
                      
                          
                          {!! Form::open(array('url' => route('admin.login.submit'),'method' => 'post','class'=>'login-form')) !!}
                           
                           @if (isset($error))
                                        <div class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        <span>{{$error}} </span>
                                    </div>
                            @endif

                           
                            <div class="row">

                        @if(isset($otp) && $otp !='')

                               <div class="col-xs-6">
                                   {!!Form::text('otp', $value = null, $attributes = array('class'=>'form-control form-control-solid placeholder-no-fix form-group','autocomplete'=>'off','required'=>'required','placeholder'=>'Please enter 6 digit OTP')); !!}
                                </div>
                                <input type="hidden" name="auth_data" value="{{$otp}}">
                        @else 
                                <div class="col-xs-6">
                                   {!!Form::text('email', $value = null, $attributes = array('class'=>'form-control form-control-solid placeholder-no-fix form-group','autocomplete'=>'off','required'=>'required','placeholder'=>'Email')); !!}
                                </div>

                                <div class="col-xs-6">
                                   {!!Form::password('password', $attributes = array('class'=>'form-control form-control-solid placeholder-no-fix form-group','autocomplete'=>'off','required'=>'required','placeholder'=>'password')); !!} 
                               </div>
                         @endif  

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        
                                    </div>
                                    <button class="btn blue" type="submit">Sign In</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                    
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; Procoop 2017</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
      
        <!-- BEGIN CORE PLUGINS -->
        {!! Html::script('public/assets/global/plugins/jquery.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/bootstrap/js/bootstrap.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/js.cookie.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/jquery.blockui.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/uniform/jquery.uniform.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); !!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::script('public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/jquery-validation/js/additional-methods.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/select2/js/select2.full.min.js'); !!}
        {!! Html::script('public/assets/global/plugins/backstretch/jquery.backstretch.min.js'); !!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! Html::script('public/assets/global/scripts/app.min.js'); !!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
      
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    <script type="text/javascript">
        var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                remember: {
                    required: false
                }
            },

            messages: {
                username: {
                    required: "Username is required."
                },
                password: {
                    required: "Password is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        $('#forget-password').click(function(){
            $('.login-form').hide();
            $('.forget-form').show();
        });

        $('#back-btn').click(function(){
            $('.login-form').show();
            $('.forget-form').hide();
        });
    }

 
  

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();

            // init background slide images
            $('.login-bg').backstretch([
                "{{url('public/assets/pages/img/login/bg1.jpg')}}",
                "{{url('public/assets/pages/img/login/bg2.jpg')}}",
                "{{url('public/assets/pages/img/login/bg3.jpg')}}"
                ], {
                  fade: 1000,
                  duration: 8000
                }
            );

            $('.forget-form').hide();

        }

    };

}();

jQuery(document).ready(function() {
    Login.init();
});


    </script>

</html>