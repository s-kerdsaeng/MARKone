@extends('layouts.app')
@section('logo')
    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="../img/site.webmanifest">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('บิลซ่อมรถ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Generate news bills') }}

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
                           
                             {!! Form::open(['action' => 'BillasController@store','method' => 'POST']) !!}
                            <div class="col-md-10">
                                <div class="form-group">
                                    {!! form::label('ชื่อบิล') !!} 
                                    {!! form::text('name',null,["class"=>"form-control"])!!}
                                 </div>
                                <div class="form-group">
                                    <label for="datetime">วันที่ออกบิล:</label>
                                    <input type="date" name="datetime" id="start" name="trip-start" >
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="trucks_id">เลือก รถ:</label>
                                            <select name="trucks_id" class="form-control" style="width:250px">
                                                <option value="">--- Select ---</option>
                                                @foreach ($ddtrucks as $key)
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="mechanics_id">เลือก ช่างซ่อมรถ:</label>
                                            <select name="mechanics_id" class="form-control" style="width:250px">
                                                <option value="">--- Select ---</option>
                                                @foreach ($ddmechanics as $key)
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="drivers_id">เลือก คนขับรถ:</label>
                                            <select name="drivers_id" class="form-control" style="width:250px">
                                                <option value="">--- Select ---</option>
                                                @foreach ($dddrivers as $key)
                                                <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="products_id">เลือก อะไหล่:</label>
                                            <select name="products_id" class="form-control" style="width:250px">
                                                <option value="">--- Select ---</option>
                                                @foreach ($ddproducts as $keyp)
                                                <option value="{{ $keyp->id }}">{{ $keyp->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group">
                                  {!! form::label('จำนวนที่ใช้') !!} 
                                  {!! form::text('total',null,["class"=>"form-control"])!!}
                               </div> 
                                <input type="submit" value="สร้างข้อมูล" class="btn btn-primary">
                                <a href="../Billas" class="btn btn-success">กลับ</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection