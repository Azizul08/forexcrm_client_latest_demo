@extends('backEnd.'.app()->getLocale().'.dashboard.layout')
@section('title', 'Bestätigungscode')
@section ('page-level-css')
<link type="text/css" rel="stylesheet" href="/css/components2.css" />
@endsection
@section('content')
<div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6">
                        <a href="/withdraw"><h4 class="nav_top_align skin_txt">
                            <i class="fa fa-user"></i>
                           Ändern Sie die Hebelwirkung
                        </h4>
                        </a>
                    </div>
                    
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="">
                        <div class="row">
                        <div class="col-md-12">
                            <ul class="up-barcurb">
                                <li class="first-li "> 1. Wählen Sie Ihr Leverage-Konto</li>
                                <li class="second-li selected"> 2. Passen Sie Ihr Leverage-Konto an</li>
                            </ul>
                        </div>
                    </div>

                        <div class="card-block">
							<h2>Bestätigungscode eingeben</h2>
							<h5>Ein Bestätigungscode wird an {!!session('login_email')!!} gesendet</h5>
							{!! Form::open(['method' => 'POST', 'url' => '/leverage-verification', 'name' => 'verificationForm','class'=>'col-md-4','style'=>'padding:0']) !!}
					<div class="form-group">
                        
                            
                        {!! Form::text('verification_code', null, ['class' => 'form-control input-lg', 'required' => 'required', 'placeholder' => 'Bestätigungscode eingeben']) !!}
                        
                            

                        <small class="text-danger">{{ $errors->first('verification_code') }}</small>
                        </div>
                        @if($errors->any())
                        <h5 style="color:red;">{{$errors->first()}}</h5>
                            @endif
                            
                            {!!Form::hidden('account',$request->account)!!}
                             {!!Form::hidden('leverage',$request->leverage)!!}
                        
                        
                        <div class="form-group">
                        {!!Form::submit('einreichen',['class'=>'btn btn-primary'])!!}
                        </div>
                        {!!Form::close()!!}
					</div>
                        </div>
                    </div>
					</div>
                </div>
                    
                    @endsection
                