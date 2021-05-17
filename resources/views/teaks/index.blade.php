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
                <div class="row">
                    <div class="col-md-9"></div>
                    <div align="right">
                        <a href="teaks/create" class="btn btn-success" align="right">เพิ่มไม้</a>
                        <a href="teaks/create" class="btn btn-primary" align="right">สร้างข้อมูลไม้</a>
                    </div>
                </div>
               <br>
                
            <div class="card">
                <div class="card-header">{{ __('ข้อมูลไม้ในคลัง') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Data of products') }}

                    <br><br>
                     <div class="col-md-11">
                         <div class="container">
                            <table class="table" align="center">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">ราคาต่อหน่วย</th>
                                    <th scope="col">จำนวนที่มี</th>
                                    <th scope="col">คิดเป็นเงิน</th>
                                    <th scope="col">เพิ่มอ่ะไหล่</th>
                                    <th scope="col">ข้อมูล</th>
                                    <th scope="col">แก้ไข</th>
                                    <th scope="col">ลบ</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php $sum = 0; ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$item->id}}</th>
                                            <td>{{$item->name}}</td>
                                            <td align="right">{{$item->price}}</td>
                                            <td align="right">{{$item->amount}}{{$item->unit}}</td>
                                            <td align="right">{{$item->price * $item->amount}} บาท.</td>
                                            <td>
                                                <a href="{{route('teakdetails.edit',$item->id)}}" 
                                                class="btn btn-success">เพิ่ม</a>
                                            </td>
                                            <td>
                                                <a href="{{route('teaks.show',$item->id)}}" 
                                                class="btn btn-primary">ข้อมูล</a>
                                            </td>
                                            <td>
                                                <a href="{{route('teaks.edit',$item->id)}}" 
                                                class="btn btn-success">แก้ไข</a>
                                            </td>
                                            <td>
                                                <form action="{{route('teaks.destroy',$item->id)}}" method="POST">
                                                    @csrf @method('DELETE')
                                                    <input type="submit" value="ลบ" data-name="{{$item->name}}" class="btn btn-danger deletebtn" >
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $sum = $sum + ($item->price * $item->amount) ?>
                                    @endforeach
                                    <thead class="thead-dark">
                                        <tr>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col">มูลค่ารวม</th>
                                          <th scope="col"><?php echo $sum; ?></th>
                                          <th scope="col">บาท</th>
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