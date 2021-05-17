@extends('layouts.app')
@section('logo')
    <link rel="apple-touch-icon" sizes="180x180" href="../../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon-16x16.png">
    <link rel="manifest" href="../../img/site.webmanifest">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('แก้ไขข้อมูลคนขับรถ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Generate news drivers') }}

                    <br><br>
                     <!-- กล่องรับข้อมูล -->
                        <div class="container">
                            @if ($errors->all())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $errorvalue)
                                        <li>
                                            {{ $errorvalue }}
                                        </li>
                                    @endforeach
                                </ul>  
                            @endif
                           
                             {!! Form::open(['action' => ['DriversController@update',$data->id],'method' => 'PUT']) !!}
                            <div class="col-md-8">
                               <div class="form-group">
                                  {!! form::label('กรอกชื่อ-นามสกุล') !!} 
                                  {!! form::text('name',$data->name,["class"=>"form-control"])!!}
                               </div> 
                               <div class="form-group">
                                  {!! form::label('กรอกเบอร์โทรศัพ') !!} 
                                  {!! form::text('phone',$data->phone,["class"=>"form-control"])!!}
                                </div> 
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                                <a href="../../drivers" class="btn btn-success">กลับ</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection