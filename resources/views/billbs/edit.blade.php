<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>   {{ config('app.name') }}</title> --}}
        <title>  KR Store</title>
        <link rel="apple-touch-icon" sizes="180x180" href="../../img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon-16x16.png">
        <link rel="manifest" href="../../img/site.webmanifest">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
<body>
      
   <div class="container" style="margin-top:200px;">
    
      <div class="row">
        <div class="col-md-3">
            {{-- <label for="">Enter Task</label>
            <input type="text" placeholder="Enter task" class="form-control form-control-sm" name="task_name"  id="task_name" value="">
            <font style="color:red"> {{ $errors->has('task_name') ?  $errors->first('task_name') : '' }} </font> --}}
            <div class="form-group">
              <label for="">เลือก อะไหล่:</label>
              <select id="task_name" name="task_name" class="form-control" style="width:250px">
                  <option value="">--- Select ---</option>
                  @foreach ($ddproducts as $keyp)
                  <option value="{{ $keyp->id }}">{{ $keyp->name }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <div class="col-md-3">
            <label for="">จำนวนที่ใช้</label>
            <input type="number" placeholder="จำนวนอ่ะไหล่" class="form-control form-control-sm" name="cost"  id="cost" value="">
            <font style="color:red"> {{ $errors->has('cost') ?  $errors->first('cost') : '' }} </font>
        </div>
        <div class="col-md-3" style="margin-top:26px;">
            <button id="addMore" class="btn btn-success btn-sm">เพิ่มรายการ </button>
        </div>
     </div>
     <div class="row" style="margin-top:26px;">
    <div class="col-md-10">

      <table class="table" align="center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">อะไหล่</th>
            <th scope="col">จำนวนที่ใช้</th>
            <th scope="col">ราคารวม</th>
            <th scope="col">แก้ไข</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datadetails as $item)
                <tr>
                    <td>รหัส:{{$item->products_id}}---->{{$item->products_name}}</td>
                    <td>{{$item->products_amount}}</td>
                    <td>{{$item->products_sum}}</td>
                    <td>
                        <form action="{{route('billdetails.destroy',$item->id)}}" method="POST">
                            @csrf @method('DELETE')
                            <input type="submit" value="ลบ" data-name="{{$item->name}}" class="btn btn-danger deletebtn" >
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

      </table>

        {{-- {!! Form::open(['action' => 'BillbsController@store','method' => 'POST']) !!} --}}
    {!! Form::open(['action' => ['BillbsController@update',$data->id],'method' => 'PUT']) !!}
    <table class="table table-sm table-bordered" style="display: none;">
      <thead>
          <tr>
              <th>รหัสอ่ะไหล่</th>
              <th>จำนวนที่ใช้</th>
              <th>Action</th>
          </tr>
      </thead>
  
      <tbody id="addRow" class="addRow">
  
      </tbody>
      <tbody>
        <tr>
          <td colspan="1" class="text-right">
              <strong>Total:</strong> 
          </td>
          <td>
              <input type="number" id="estimated_ammount" class="estimated_ammount" value="0" readonly>
          </td>
        </tr>
      </tbody>
  
      </table>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
              <label for="">เลือก รถ:</label>
              <select id="trucks_id" name="trucks_id" class="form-control" style="width:250px">
                  <option value="{{$data->trucks_id}}">{{$data->trucks_name}}</option>
                  @foreach ($ddtrucks as $key)
                  <option value="{{ $key->id }}">{{ $key->name }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">เลือก คนขับรถ:</label>
            <select id="drivers_id" name="drivers_id" class="form-control" style="width:250px">
                <option value="{{$data->drivers_id}}">{{$data->drivers_name}}</option>
                @foreach ($dddrivers as $key)
                <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
            </select>
          </div>

        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">เลือก ช่างซ่อมรถ:</label>
            <select id="mechanics_id" name="mechanics_id" class="form-control" style="width:250px">
                <option value="{{$data->mechanics_id}}">{{$data->mechanics_name}}</option>
                @foreach ($ddmechanics as $key)
                <option value="{{ $key->id }}">{{ $key->name }}</option>
                @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            {!! form::label('ชื่อบิล') !!} 
            {!! form::text('name',$data->name,["class"=>"form-control"])!!}
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
             <label for="datetime">วันที่ออกบิล:</label> <br>
             <input type="date" name="datetime" id="datetime" value="{{$data->datetime}}" name="trip-start" >
          </div>
        </div>
        
      
      </div>
     
    
   <button type="submit" class="btn btn-success ">บันทึก</button>
   {!! Form::close() !!}

    </div>
  </div>
</div>


<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script> 

<script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item" id="delete_add_more_item">

      <td>
        <input type="text" name="task_name[]" value="@{{ task_name }}">
      </td>
      <td>
        <input type="number" class="cost" name="cost[]" value="@{{ cost }}">
      </td>
  
      <td>
       <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
      </td>

  </tr>
 </script>

<script type="text/javascript">
 
 $(document).on('click','#addMore',function(){
    
     $('.table').show();
     var datetime = $("#datetime").val();
     var trucks_id = $("#trucks_id").val();
     var mechanics_id = $("#mechanics_id").val();
     var drivers_id = $("#drivers_id").val();
     var task_name = $("#task_name").val();
     var cost = $("#cost").val();
     var source = $("#document-template").html();
     var template = Handlebars.compile(source);

     var data = {
        datetime: datetime,
        trucks_id: trucks_id,
        mechanics_id: mechanics_id,
        drivers_id: drivers_id,
        task_name: task_name,
        cost: cost
     }

     var html = template(data);
     $("#addRow").append(html)
   
     total_ammount_price();
 });

  $(document).on('click','.removeaddmore',function(event){
    $(this).closest('.delete_add_more_item').remove();
    total_ammount_price();
  });

  function total_ammount_price() {
    var sum = 0;
    $('.cost').each(function(){
      var value = $(this).val();
      if(value.length != 0)
      {
        sum += parseFloat(value);
      }
    });
    $('#estimated_ammount').val(sum);
  }
                       
</script>

    </body>
</html> 