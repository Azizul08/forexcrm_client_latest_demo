
@extends('backEnd.'.app()->getLocale().'.dashboard.layout')

@section('title', 'MAM和PAMM平台')
@section ('page-level-css')
<link type="text/css" rel="stylesheet" href="/css/components2.css" />
<style>
@media (min-width: 1367px)
{
    #outer{
        position: absolute;
        width: 100%;
        top: 100%;
        margin-top: 0px;
    }
}
    
</style>
@endsection
@section('content')

<div id="content" class="bg-container">
    <header class="head">
        <div class="main-bar row">
            <div class="col-lg-6">
                <a href="/mam-pamm-platform"><h4 class="nav_top_align skin_txt">
                    <i class="fa fa-link"></i>
                    MAM和PAMM平台
                </h4>
            </a>
        </div>
        
    </div>
</header>
<div class="outer">
    <div class="row">
            <div class="col-lg-12 m-t-35">
                <div class="">
                    <p style="text-align: center;font-size: 30px;color: #999">請聯繫服務提供商</p>
                </div>
            </div>
        </div>
    </div>
</div>

            @endsection
