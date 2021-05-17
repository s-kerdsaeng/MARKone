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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('แก้ไขบิลเบิกของ') }}</div>

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
                           
                             {!! Form::open(['action' => ['BillasController@update',$data->id],'method' => 'PUT']) !!}
                            <div class="col-md-10">
                               <div class="form-group">
                                  {!! form::label('ชื่อบิล') !!} 
                                  {!! form::text('name',$data->name,["class"=>"form-control"])!!}
                               </div> 
                               <div class="form-group">
                                <label for="datetime">วันที่ออกบิล:</label>
                                <input type="date" name="datetime" value="{{$data->datetime}}" id="start" name="trip-start" >
                               </div>
                               <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="trucks_id">เลือก เลขทะเบียนรถ:</label>
                                        <select name="trucks_id" class="form-control" style="width:250px">
                                            <option value="{{$data->trucks_id}}">{{$data->trucks_name}}</option>
                                            @foreach ($ddtrucks as $key)
                                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="mechanics_id">เลือก ช่างซ่อมรถ</label>
                                            <select name="mechanics_id" class="form-control" style="width:250px">
                                                <option value="{{$data->mechanics_id}}">{{$data->mechanics_name}}</option>
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
                                                    <option value="{{$data->drivers_id}}">{{$data->drivers_name}}</option>
                                                    @foreach ($dddrivers as $key)
                                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="products_id">เลือก อะไหล่:</label>
                                                <select name="products_id" class="form-control" style="width:250px">
                                                    <option value="{{$data->products_id}}">{{$data->products_name}}</option>
                                                    @foreach ($ddproducts as $keyp)
                                                    <option value="{{ $keyp->id }}">{{ $keyp->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                              {{--  <div class="form-group">
                                  {!! form::label('วันที่') !!} 
                                  {!! form::text('price',$data->price,["class"=>"form-control"])!!}
                                </div>
                                <div class="form-group">
                                    {!! form::label('จำนวน') !!} 
                                    {!! form::text('amount',$data->amount,["class"=>"form-control"])!!}
                                 </div> 
                                 <div class="form-group">
                                    {!! form::label('หนวยที่ใช้') !!} 
                                    {!! form::text('unit',$data->unit ,["class"=>"form-control"])!!}
                                  </div>   --}}
                                  <div class="form-group">
                                    {!! form::label('จำนวนที่ใช้') !!} 
                                    {!! form::text('total',$data->total,["class"=>"form-control"])!!}
                                 </div>
                                <input type="submit" value="บันทึก" class="btn btn-primary">
                                <a href="../../billas" class="btn btn-success">กลับ</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection