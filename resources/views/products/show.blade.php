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
            <br>
               {{--  <div align="right">
                    <a href="products/create" class="btn btn-primary" align="right">สร้างข้อมูลอ่ะไหล่</a>
                </div> --}}
               <br>
                
            <div class="card">
                <div class="card-header">{{ __('ข้อมูลการใช้อ่ะไหล่') }}------> {{$name}} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Data of products') }}

                    <br><br>
                     <div class="col-md-10">
                         <div class="container">
                            <table class="table" align="center">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">ชื่อรายการ</th>
                                    <th scope="col">วันที่ ปี/เดิอน/วัน</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">จำนวนที่ใช้</th>
                                    <th scope="col">จำนวนที่เหลือ</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php $sum = 0; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{$item->bill_name}}</td>
                                            <td align="left">{{$item->datetime}}</td>
                                            <?php
                                                $status = $item->status;
                                                if($status == 'นำออก'){ ?>
                                                    <td class="text-danger" align="center" >-----<?php echo $status ;?></td>    
                                               <?php }
                                                else{ ?>
                                                    <td class="text-success" align="center" ><?php echo $status ;?>+++++</td>
                                               <?php } ?>
                                            <td align="right">{{$item->amount}}</td>
                                            <td align="right">{{$item->sum}}</td>
                                            

                                            {{-- <td>
                                                <a href="{{route('products.edit',$item->id)}}" 
                                                class="btn btn-success">แก้ไข</a>
                                            </td>
                                            <td>
                                                <form action="{{route('products.destroy',$item->id)}}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="ลบ" data-name="{{$item->name}}" class="btn btn-danger deletebtn" >
                                                </form>
                                            </td> --}}
                                        </tr>
                                       
                                    @endforeach
                                    <thead class="thead-dark">
                                        <tr>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                        </tr>
                                      </thead>  
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