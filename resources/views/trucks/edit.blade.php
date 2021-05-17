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
                <div class="card-header">{{ __('แก้ไขข้อมูลรถ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Generate news trucks') }}

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
                           
                             {!! Form::open(['action' => ['TrucksController@update',$data->id],'method' => 'PUT']) !!}
                            <div class="col-md-8">
                               <div class="form-group">
                                  {!! form::label('กรอกชื่อรถ') !!} 
                                  {!! form::text('name',$data->name,["class"=>"form-control"])!!}
                               </div> 
                               <div class="form-group">
                                  {!! form::label('เลขทะเบียน') !!} 
                                  {!! form::text('number',$data->number,["class"=>"form-control"])!!}
                                </div>
                                <div class="form-group">
                                    {!! form::label('กรอกน้ำหนัก(รถเบา)') !!} 
                                    {!! form::text('weight',$data->weight,["class"=>"form-control"])!!}
                                 </div> 
                                 <div class="form-group">
                                    {!! form::label('ค่าใช้จ่ายในการซ่อมรถ') !!} 
                                    {!! form::text('expenses',$data->expenses ,["class"=>"form-control"])!!}
                                  </div>  
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                                <a href="../../trucks" class="btn btn-success">กลับ</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection