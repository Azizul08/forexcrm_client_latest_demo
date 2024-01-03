@extends('backEnd.'.app()->getLocale().'.dashboard.layout') 
@section('title', 'Open Investor Account') 
@section ('page-level-css')
<link type="text/css" rel="stylesheet" href="/css/components2.css" />
<link href="/css/passwordRulesHelper.min.css" rel="stylesheet" />
@endsection
 
@section('content')

<div id="content" class="bg-container">
  <header class="head">
    <div class="main-bar">
      <div class="row no-gutters">
        <div class="col-6">
          <h4 class="m-t-5">
            <i class="fa fa-globe"></i> Open Investor Account
          </h4>
        </div>
      </div>
    </div>
  </header>
  <div class="outer">
    <div class="inner bg-container">

      <!--top section widgets-->
      <div class="card">
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <ul class="up-barcurb">
                <li class="first-li "> 1. Choose your account type</li>
                <li class="second-li selected"> 2. Customise your trading account </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row-fluid trade">
          <div class="span12 grey_bg">
            <div class="padding15">
              <div class="form-part">
                <div class="row-fluid">
                  @if(Session::has('msg'))
                  <div class="col-md-12">
                    <div class="alert alert-success">
                      <h3 style="color: #fff;padding-top: 5px;">{{Session::get('msg')}}</h3>
                    </div>
                  </div>
                  @endif @if(Session::has('error'))
                  <div class="col-md-12">
                    <div class="alert alert-danger">
                      <h3 style="color: #fff;padding-top: 5px;">{{Session::get('error')}}</h3>
                    </div>

                  </div>
                  @endif @if(Session::has('max_allowance_error'))
                  <div class="col-md-12">
                    <div class="alert alert-danger">
                      <h3 style="color: #fff;padding-top: 5px;">{{Session::get('max_allowance_error')}}</h3>
                    </div>
                  </div>
                  @endif {!! Form::open(['method' => 'POST','files' => true, 'url' => LaravelLocalization::localizeURL('/open-investor-account'),
                  'name' => 'withdrawForm','id' => 'withdrawForm','class'=>'col-md-7 form form-horizontal']) !!} {{-- Manager
                  id --}}
                  <input type="hidden" name="manager_id" value="{{ $manager_id }}">

                  <br>
                  <div class="form-group">
                    <label for="password">Investor Password:</label>
                    <input type='password' name='password' id='passwordField' class='form-control' autocomplete='new-password' required="required"
                      style="width: 60%" />
                    <span class='message'></span>
                  </div>
                  <div class="form-group">
                    <label for="c_password">Confirm Investor Password:</label>
                    <input type="password" name="c_password" id="c_password" required="required" maxlength="20" class="form-control" style="width: 60%">
                    <span id='message'></span>
                  </div>
                  <div class="span4 form-group">
                    <input type="submit" id="submit" class="btn btn-primary" value="Create" name="investor_account">
                    <a href="/manager-list" style="margin-left: 10px">Manager List</a>

                  </div>

                  {!!Form::close()!!} {{--
                  <div class="col-md-5">
                    <div class="">
                      <div class="">
                        <h5>Summery</h5>
                        <div class="bank-table">
                          <table class="table" id="myTable">
                            <tbody>
                              <tr>
                                <td class="left">Account Group</td>
                                <td class="left">Live Account</td>
                              </tr>
                              <tr>
                                <td class="left">Account Type</td>
                                <td class="left" id="type_account"></td>
                              </tr>
                              <tr>
                                <td class="left">Account Currency</td>
                                <td class="left" id="currency_show"></td>
                              </tr>
                              <tr>
                                <td class="left">Leverage</td>
                                <td class="left" id="leverage_show"></td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- /.inner -->
  </div>
</div>
</div>
</div>
@endsection
 
@section('page-level-js')
<script src="/js/passwordRulesHelper.min.js"></script>
<script type="text/javascript">
  $(function(){
    var form = $("#withdrawForm");

    form.validate({
      rules:{
        account_type:{
          required: true,
        },
        leverage:{
          required:true,
        },
        password:{
          required:true,
        },
        c_password:{
          required:true,
        }
      },
      messages:{
        account_type:{
          required:"Please select account type"
        },
        leverage:{
          required:"Select leverage please",
        },
        password:{
          required:"Password is required",
        },
        c_password:{
          required:"Confirm your password",
        }
      }
    }),

    $('#passwordField').passwordRulesValidator();
    $('.rules').hide();
    $('#passwordField, #c_password').on('keyup', function () {
      $('.rules').show();
      if ($('#passwordField').val() == $('#c_password').val()) {
        $('#message').html('Password Matched').css('color', 'green');
      } else 
      $('#message').html('').css('color', 'red');
    });


    $('#form_id').on('submit', function(e){
      var o_pass = $('#passwordField').val();
      var s_pass = $('#c_password').val();
      if ( o_pass!= s_pass) {

        $('#message').html('Password doesn\'t match').css('color', 'red');
        e.preventDefault();
      }
      else{
        var flag1 = checkMatchedPass(o_pass).a;
        var flag2 = checkMatchedPass(o_pass).b;
        var flag3 = checkMatchedPass(o_pass).c;
        var flag4 = checkMatchedPass(o_pass).d;
        var flag5 = checkMatchedPass(o_pass).e;

        if (flag1 == 0) {
                  // $('.message').html('Check Condition').css('color', 'red');
                  e.preventDefault();
                }
                if (flag2 == 0) {
                  // $('.message').html('Check Condition').css('color', 'red');
                  e.preventDefault();
                }
                if (flag3 == 0) {
                  // $('.message').html('Check Condition').css('color', 'red');
                  e.preventDefault();
                }
                if (flag4 == 0) {
                  // $('.message').html('Check Condition').css('color', 'red');
                  e.preventDefault();
                }
                if (flag5 == 0) {
                  // $('.message').html('Check Condition').css('color', 'red');
                  e.preventDefault();
                }
                
              }

            });

    $('#account_type').on('change',function(){
      $select_val=$('#account_type option:selected').text();
      $('#type_account').html($select_val);

    });
    $select_val=$('#account_type option:selected').text();
    $('#type_account').html($select_val);

    $('#leverage').on('change',function(){
      $select_val1=$('#leverage option:selected').text();
      $('#leverage_show').html($select_val1);
    });
    $select_val1=$('#leverage option:selected').text();
    $('#leverage_show').html($select_val1);

    var $select_val2=$('#currency').val();
    $('#currency_show').html($select_val2);

            //how to transfer section
            $('.show-transfer-hide').hide();
            $('.up').hide();
            $('.show-transfer').click(function(){
              $(this).toggleClass('green');
              $('.down').toggle('2000');
              $('.show-transfer-hide').toggle('2000');
              $('.up').toggle();
            });
          });

  function checkMatchedPass(pass){

    regexp1 = /[^A-Z]/;
    regexp2 = /[^a-z]/;
    regexp3 = /[^a-zA-Z0-9]{1,}/;
    regexp4 = /[^0-9]{1,}/;
    var a =0;
    var b= 0;
    var c =0;
    var d= 0;
    var e =0;
    if (regexp1.test(pass)) {a= 1;}
    if (regexp2.test(pass)) {b= 1;}
    if (pass.length>=8) {c= 1;}
    if (regexp3.test(pass)) {d= 1;}
    if (regexp4.test(pass)) {e= 1;}
    return v = {a,b,c,d,e};

  }

</script>
@endsection