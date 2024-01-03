@php
use Illuminate\Support\Facades\DB;
@endphp
@extends('backEnd.'.app()->getLocale().'.dashboard.layout')
@section('title', '客户端仪表板')
@section ('page-level-css')
<link type="text/css" rel="stylesheet" href="/css/components2.css" />
@endsection
@section('content')
<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar">
            <div class="row no-gutters">
                <div class="col-6">
                    <h4 class="m-t-5">
                        <i class="fa fa-home"></i>
                        账户总览
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="panel-button">
                            <a href="/verify-profile">个人资料验证</a>
                            <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                            <a href="/open-trading-account">开设交易账户</a>
                            <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                            <a href="/deposit-funds">入金</a>
                            <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                            <a href="/download-platforms">交易平台</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row sales_section">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card p-d-15">
                        <div class="sales_icons">
                            <span class="bg-info"></span>
                            <i class="fa fa-window-close"></i>
                        </div>
                        <div>
                            <h5 class="sales_orders text-right m-t-5">平仓订单</h5>
                            <h1 class="sales_number m-t-15 text-right" id="orders_countup"><span id="sales_count" class="number_val">{{$order}}</span></h1>
                            <p class="sales_text">总交易量: {{$volume}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 media_max_573">
                    <div class="card p-d-15">
                        <div class="sales_icons">
                            <span class="bg-danger"></span>
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <div>
                            <h5 class="sales_orders text-right m-t-5">账户资金</h5>
                            <h1 class="sales_number m-t-15 text-right"><span id="visitors_count" class="number_val">{{$balance}}</span>
                            </h1>
                            <p class="sales_text">净值: {{$equity}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 media_max_1199">
                    <div class="card p-d-15">
                        <div class="sales_icons">
                            <span class="bg-warning"></span>
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div>
                            <h5 class="sales_orders text-right m-t-5">存款</h5>
                            <h1 class="sales_number m-t-15 text-right" id="sold_countup"><span id="revenue_count" class="number_val">{{$deposit}}</span></h1>
                            <p class="sales_text">奖金: {{$cr_in}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 media_max_1199">
                    <div class="card p-d-15">
                        <div class="sales_icons">
                            <span class="bg-primary"></span>
                            <i class="fa fa-money"></i>
                        </div>
                        <div>
                            <h5 class="sales_orders text-right m-t-5">提款</h5>
                            <h1 class="sales_number m-t-15 text-right" id="products_countup">
                                <span id="subscribers_count" class="number_val">{{$withdraw}}</span></h1>
                                <p class="sales_text">内部转移: {{$in_tr}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="outer">
            <div class="inner bg-light lter bg-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="live-account m-b-20" style="">
                         <div class="" style="background: #fdfdfd;">
                            <div class="">
                                <div class="">
                                    <div class="heading-transiction">
                                        <p>我的真实账户</p>
                                    </div>
                                    <div class="main-table table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>账户号码</th>
                                                    <th>账户类型</th>  
                                                    <th>交易杠杆</th>
                                                    <th>账户资金</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($accounts as $key => $account)
                                                <tr>
                                                    <td><a href="/trading_account-{{$account->account_no}}" style="padding: 0">{{$account->account_no}}</a></td>
                                                    <td class="frt-td">
                                                        <img src="/img/standard-ac-type.png" alt="" width="40px" height="40px">
                                                        <p>{{$account->act_type}}</p>
                                                    </td>                                                
                                                    <td>1:{{$account->leverage}}</td>
                                                    <td>{{$account->BALANCE}}</td>
                                                    <td class="last-td"><div class="dropdown">
                                                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                                      style="background-size:cover;width: 50px;">
                                                      <span class="caret"></span>
                                                  </button>
                                                  <ul class="dropdown-menu form-dropdown" aria-labelledby="dropdownMenu1">
                                                    <li><a href="/deposit-funds?ac={{$account->account_no}}">入金方式方式</a></li>
                                                    <li><a href="/withdraw-funds?ac={{$account->account_no}}">提款</a></li>
                                                    <li><a href="/internal-transfer?ac={{$account->account_no}}">内部转账</a></li>
                                                    <li><a href="/change-leverage?ac={{$account->account_no}}">更改杠杆</a></li>
                                                    <li><a href="/change-mt4-password?ac={{$account->account_no}}">更改交易密码</a></li>
                                                    <li><a href="/trading_account-{{$account->account_no}}">账户詳細资料</a></li>
                                                    <li><a href="/verify-profile">验证资料</a></li>
                                                    <li><a href="/download-platforms">下载平台</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-button m-t-5">
                                <a href="/open-new-account"><button>开设实盘/模拟账户</button></a>
                                <a href="/all-trading-accounts"><button>查看所有帐户</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="overflow: auto; !important;">
         <div class="" style="background: #fdfdfd">
            <div class="">
                <div class="">
                    <div class="heading-transiction">
                        <p> 账户转账 </p>
                    </div>
                    <div class="main-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>入金方式方式</th>  
                                    <th>资金/费用</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="frt-td"><img class="hidden-xs transaction-img" src="/img/logo-1531195160.png" alt="">
                                        <p><a href="/bank-transfer-funds">Bank Transfer</a></p></td>
                                        <td>无佣金</td>
                                        <td class="last-td"><a href="/bank-transfer-funds"><button>入金</button></a></td>
                                    </tr>
                                    <tr>
                                        <td class="frt-td"><img class="hidden-xs transaction-img" src="/img/card_icon.png" alt="">
                                            <p><a href="/voguepay_deposit">Visa/ Master Card</a></p></td>
                                            <td>无佣金</td>
                                            <td class="last-td"><a href="/voguepay_deposit"><button>入金</button></a></td>
                                        </tr>
                                        <tr>
                                            <td class="frt-td"><img class="hidden-xs transaction-img" src="/img/upaycard.png" alt="">
                                                <p><a href="/upaycard-deposit">UPay Card</a></p></td>
                                            
                                            
                                            <td>无佣金</td>
                                            
                                            <td class="last-td"><a href="/upaycard-deposit"><button>入金</button></a></td>
                                        </tr>
                                        <tr>
                                            <td class="frt-td"><img class="hidden-xs transaction-img" src="/img/scrill_2.png" alt="">
                                                <p><a href="/skrill_deposit">Skrill</a></p></td>
                                                <td>无佣金</td>
                                                <td class="last-td"><a href="/skrill_deposit"><button>入金</button></a></td>
                                            </tr>
                                            <tr>
                                                <td class="frt-td"><img class="hidden-xs transaction-img" src="/img/ic_neteller.png" alt="">
                                                    <p><a href="/neteller_deposit">Neteller</a></p></td>
                                                    <td>无佣金</td>
                                                    <td class="last-td"><a href="/neteller_deposit"><button>入金</button></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="frt-td"><img class="hidden-xs transaction-img" src="/img/Perfectmoney.png" alt="">
                                                        <p><a href="/perfect_money_deposit">Perfect Money</a></p></td>
                                                        <td>无佣金</td>
                                                        <td class="last-td"><a href="/perfect_money_deposit"><button>入金</button></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card m-t-35">
                            <div class="card-header bg-white">
                                实盘交易
                                <a style="text-decoration: underline;" class="pull-right" href="/live-trades">查看全部</a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive m-t-35" style="display: block;">
                                    <table class="table table-striped table-bordered table-advance table-hover table_status_padding">
                                        <thead style="font-weight: bold;">
                                          <tr>
                                            <td  align="left">帳戶</td>
                                            <td>记录</td>
                                            <td>时间</td>
                                            <td>类型</td>
                                            <td>手数</td>
                                            <td>合约</td>
                                            <td>开盘价</td>
                                            <td>止损/现价</td>
                                            <td>盈利</td>
                                            <td>持仓价</td>
                                            <td>佣金</td>
                                            <td>利息</td>
                                            <td>利润</td>
                                            <td>净值</td>
                                        </tr></thead>
                                        <tbody id="">
                                            @php
                                            $running='No';
                                            $coun_tr=0;
                                            foreach($all_accounts as $account){
                                              $trades=DB::table('mt4_trades')->where([
                                                ['LOGIN',$account->account_no],
                                                ['CLOSE_TIME','1970-01-01 00:00:00']
                                            ])->orderBy('TICKET', 'desc')->get();
                                              if(count($trades)>0){
                                                  $running='Yes';
                                              }
                                              foreach($trades as $trade){
                                                  if($trade->CMD=='0'){
                                                      $cmd='Buy';
                                                  }
                                                  elseif ($trade->CMD=='1'){
                                                      $cmd='Sell';
                                                  }
                                                  else{
                                                    $cmd='';
                                                }
                                                $open_time=$trade->OPEN_TIME;
                                                $open_time=strtotime($open_time);
                                                $open_time=date('m/d/y',$open_time);
                                                $lots=$trade->VOLUME/100;
                                                $l_equity= DB::table('mt4_users')->where(
                                                    'LOGIN',$account->account_no)->first();    
                                                echo '
                                                <tr>
                                                <td>'.$trade->LOGIN.'</td>
                                                <td>'.$trade->TICKET.'</td>
                                                <td>'.$open_time.'</td>
                                                <td>'.$cmd.'</td>
                                                <td>'.$lots.'</td>
                                                <td>'.$trade->SYMBOL.'</td>
                                                <td>'.$trade->OPEN_PRICE.'</td>
                                                <td>'.$trade->SL.'</td>
                                                <td>'.$trade->TP.'</td>
                                                <td>'.$trade->CLOSE_PRICE.'</td>
                                                <td>'.$trade->COMMISSION.'</td>
                                                <td>'.$trade->SWAPS.'</td>
                                                <td>'.$trade->PROFIT.'</td>
                                                <td>'.$l_equity->EQUITY.'</td>
                                                </tr>';
                                                if($trade->LOGIN)
                                                    {$coun_tr+=1;
                                                    }
                                                    if($coun_tr==7){
                                                        break;
                                                    }
                                                }
                                            }  
                                            if($running=='No'){
                                                echo '<tr><td colspan="14" style="text-align:center;"><strong>无持仓订单</strong></td></tr>';
                                            } 
                                            @endphp
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
            aria-hidden="true">
            <form>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="float-right" aria-hidden="true">&times;</span>
                        </button>
                        <div class="input-group search_bar_small">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /#content -->
</div>
@endsection
@section('page-level-js')
<script type="text/javascript" src="{{asset('js/countUp.min.js')}}"></script>
<script>
    var options = {
        useEasing: true,
        useGrouping: true,
        separator: ',',
        decimal: '.',
        prefix: '',
        suffix: ''
    };
    new CountUp("sales_count", 0, <?php echo json_encode($order, JSON_HEX_TAG); ?>, 0, 6, options).start();
    new CountUp("visitors_count", 0, <?php echo json_encode($balance, JSON_HEX_TAG); ?>, 0, 6, options).start();
    new CountUp("revenue_count", 0, <?php echo json_encode($deposit, JSON_HEX_TAG); ?>, 0, 6, options).start();
    new CountUp("subscribers_count", 0, <?php echo json_encode($withdraw, JSON_HEX_TAG); ?>, 0, 6, options).start();
</script>
@endsection