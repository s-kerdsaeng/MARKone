@extends('layouts.app')
@section('logo')
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
                <div align="right">
                    <a href="billas/create" class="btn btn-primary" align="right">สร้างข้อมูลบิล</a>
                </div>
               <br>
                
            <div class="card">
                <div class="card-header">{{ __('ข้อมูลบิลซ่อมรถ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Data of bills') }}

                    <br><br>
                     <div class="col-md-11">
                         <div class="container">
                            <table class="table" align="center">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">เลขที่</th>
                                    <th scope="col">ชื่อบิล</th>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">เลขรถ</th>
                                    <th scope="col">ชื่อช่าง</th>
                                    <th scope="col">ชื่อคนขับ</th>
                                    <th scope="col">ชื่ออะไหร่</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th> 
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->datetime}}</td>
                                            <td>{{$item->trucks_name}}</td>
                                            <td>{{$item->mechanics_name}}</td>
                                            <td>{{$item->drivers_name}}</td>
                                            <td>{{$item->products_name}}</td> 
                                            <td>
                                                <a href="{{route('billas.edit',$item->id)}}" 
                                                class="btn btn-success">แก้ไข</a>
                                            </td>
                                            <td>
                                                <form action="{{route('billas.destroy',$item->id)}}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="ลบ" data-name="{{$item->name}}" class="btn btn-danger deletebtn" >
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                  
                                </tbody>
                              </table>
                         </div>


                     </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection