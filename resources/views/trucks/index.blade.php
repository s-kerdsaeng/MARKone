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
                    <a href="trucks/create" class="btn btn-primary" align="right">สร้างข้อมูลรถ</a>
                </div>
               <br>
                
            <div class="card">
                <div class="card-header">{{ __('ข้อมูลรถทุกคัน') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Data of trucks') }}

                    <br><br>
                     <div class="col-md-10">
                         <div class="container">
                            <table class="table" align="center">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ-ชนิดของรถ</th>
                                    <th scope="col">เลขทะเบีนน</th>
                                    <th scope="col">น้ำหนัก กก.</th>
                                    <th scope="col">ค่าซ่อมทั้งหมด</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->number}}</td>
                                            <td>{{$item->weight}}กก.</td>
                                            <td>{{$item->expenses}}บาท</td>
                                            <td>
                                                <a href="{{route('trucks.edit',$item->id)}}" 
                                                class="btn btn-success">แก้ไข</a>
                                            </td>
                                            <td>
                                                <form action="{{route('trucks.destroy',$item->id)}}" method="POST">
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