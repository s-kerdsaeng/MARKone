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
        <div class="col-md-10">
            <br>
                <div align="right">
                    <a href="mechanics/create" class="btn btn-primary" align="right">สร้างข้อมูลช่าง</a>
                </div>
               <br>
                
            <div class="card">
                <div class="card-header">{{ __('ข้อมูลช่างทุกคน') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Data of mechanics') }}

                    <br><br>
                     <div class="col-md-8">
                         <div class="container">
                            <table class="table" align="center">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">เบอร์โทร</th>
                                    <th scope="col">แก้ไขข้อมูล</th>
                                    <th scope="col">ลบข้อมูล</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                <a href="{{route('mechanics.edit',$item->id)}}" 
                                                class="btn btn-success">แก้ไข</a>
                                            </td>
                                            <td>
                                                <form action="{{route('mechanics.destroy',$item->id)}}" method="POST">
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