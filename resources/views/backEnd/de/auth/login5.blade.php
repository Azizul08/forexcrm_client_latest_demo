
 @extends('backEnd.'.app()->getLocale().'.auth.signin-layout')
 @section ('title')
 EINLOGGEN
@endsection
@section('css-link')
    <link type="text/css" rel="stylesheet" href="{{asset('css/pages/login5.css')}}"/>

@endsection
 

    @section('main-body')
    <section class="main-body">
      <div class="container">
        <div class="row clearfix">
          <div class="col-md-6 col-xs-12">
            <form class="clearfix form-login" id="login" method="POST" action="{{LaravelLocalization::localizeURL('/login')}}">
            <h4 class="form-h4">EINLOGGEN</h4>
            @if ($errors->has('msg'))
        
            <span class="help-block" style="text-align:center; color:red">
                <strong>{{ $errors->first('msg') }}</strong>
            </span>
        <br>
        @endif
         @if (Session::has('password'))
                                <span class="help-block">
                                    <strong style="color: #00BF86;">{{ Session::get('password') }}</strong>
                                </span>
                                <br>
                                @endif 
        {{ csrf_field() }}
            <div class="row">
              
                <div class="form-group">
                  <input readonly type="email" id="email" name="email" style="color: #777"  required="required" onfocus="if (this.hasAttribute('readonly')) {
    this.removeAttribute('readonly');
    // fix for mobile safari to show virtual keyboard
    this.blur();    this.focus();  }" />
                  <label class="control-label" for="input">Email</label><i class="bar"></i>
                  @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                </div>
              
            </div>
            <div class="row">
             
              <div class="form-group">
                  <input readonly type="password" id="password" name="password" style="color: #777"   required="required" onfocus="if (this.hasAttribute('readonly')) {
    this.removeAttribute('readonly');
    // fix for mobile safari to show virtual keyboard
    this.blur();    this.focus();  }" />
                  <label class="control-label" for="input">Passwort</label><i class="bar"></i>
                  @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
              <div class="col-md-6 col-xs-12 col-sm-6 anc-style no-padding">
                <a href="/reset-password">Passwort wiederherstellen</a>
              </div>
              <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                <button type="submit" class="mat-form-button">Anmelden</button>
               
              </div>
              
            </div>
            </form>
          </div>
          <div class="col-md-6 col-xs-12 text-center no-padding">
            <div class="reg-des">
              <p>Nicht registriert?</p>
              <small>Fangen sie heute mit dem handeln an</small>
              <div>
                <a href="/live-account-register">
                  <button type="" class="mat-form-button1">Live-Konto eröffnen</button>
                </a>
                <a href="/demo-account-register">
                  <button type="" class="mat-form-button2">Demo-Konto eröffnen</button>
                </a>
              </div>
              <!-- <small class="small-font">Losses can exceed your deposits</small> -->
              <div class="flex-container">
                <div>
                  <img src="{{asset('img/login_1st_img_'.app()->getLocale().'.png')}}" alt="">
                  <small class="small-font">{{$general_info_others->login_1st_img_text}}</small>
                </div>
                <div>
                  <img src="{{asset('img/login_2nd_img_'.app()->getLocale().'.png')}}" alt="">
                  <small class="small-font">{{$general_info_others->login_2nd_img_text}}</small>
                </div>
                <div>
                  <img src="{{asset('img/login_3rd_img_'.app()->getLocale().'.png')}}" alt="">
                  <small class="small-font">{{$general_info_others->login_3rd_img_text}}</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endsection




    @section('js-link')
    <!-- <script>
        $(document).on('submit','form.form-login',function(){
        $('.mat-form-button').hide();
        $('.form-button-logging').show();
      });
    </script> -->
    <script src="/js/jquery.validate.js"></script>
    <script type="text/javascript">
      $(function(){
    
    var twoToneButton = document.querySelector('.mat-form-button');
    
    twoToneButton.addEventListener("click", function() {
        twoToneButton.innerHTML = "Signing In";
        twoToneButton.classList.add('spinning');
        
      setTimeout( 
            function  (){  
                twoToneButton.classList.remove('spinning');
                twoToneButton.innerHTML = "Sign In";
                
            }, 2000);
    }, false);
    
});
    </script>
    
    <script type="text/javascript" src="{{asset('js/pages/login5.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function($) {
        var Body = $('body');
        Body.addClass('preloader-site');
        });
        $(window).load(function() {
            $('.preloader-wrapper').fadeOut();
            $('body').removeClass('preloader-site');
        });
    </script>
    <script>
      $(function(){

        $("#login").bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields : {
          email: {
                validators: {
                    notEmpty: {
                        message: 'Die E-Mail-Adresse ist erforderlich und darf nicht leer sein'
                    },
                    emailAddress: {
                        message: 'Die E-Mail-adresse ist nicht gültig'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Das Passwort ist erforderlich und darf nicht leer sein'
                    },
                    // different: {
                    //     field: 'username',
                    //     message: 'The password cannot be the same as username'
                    // },
                    
                }
            },
        }
        
  });

    // var form = $("#login");

    // form.validate({
    //   rules:{
    //     email:{
    //       required:true,
    //     },
    //   }
    // });

    

   
         

      });
    </script>

    @endsection
  