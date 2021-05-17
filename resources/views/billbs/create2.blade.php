<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'KR Store') }} --}}
        KR Store
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/bonus.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Title logo -->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="../img/site.webmanifest">
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: red">
                   {{--  {{ config('app.name', 'KR Store') }} --}}
                   KR Store
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            {{date("d/m/Y H:i:s")}}
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
           <script src="//code.jquery.com/jquery.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script> 

           <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('บิลซ่อมรถ v2') }}</div>
        
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
                                   
                                     {!! Form::open(['action' => 'BillbsController@store','method' => 'POST']) !!}
                                     @csrf
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            {!! form::label('ชื่อบิล') !!} 
                                            {!! form::text('name',null,["class"=>"form-control"])!!}
                                         </div>
                                        <div class="form-group">
                                            <label for="datetime">วันที่ออกบิล:</label>
                                            <input type="date" name="datetime" id="start" name="trip-start" >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="trucks_id">เลือก รถ:</label>
                                                    <select name="trucks_id" class="form-control" style="width:250px">
                                                        <option value="">--- Select ---</option>
                                                        @foreach ($ddtrucks as $key)
                                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
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
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="drivers_id">เลือก คนขับรถ:</label>
                                                    <select name="drivers_id" class="form-control" style="width:250px">
                                                        <option value="">--- Select ---</option>
                                                        @foreach ($dddrivers as $key)
                                                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        {!! form::label('จำนวนที่ใช้') !!} 
                                                        {!! form::text('total',null,["class"=>"form-control"])!!}
                                                     </div> 
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">กดเพิ่มข้อมูลอ่ะไหล่</label> <br>
                                                        <button id="addMore" class="btn btn-success">เพิ่ม</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-sm table-bordered" style="display: none;">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ชื่ออะไหล่</th>
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
                                        
                                       
                                        <input type="submit" value="สร้างข้อมูล" class="btn btn-primary">
                                         <a href="../Billbs" class="btn btn-danger">กลับ</a> 
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
</body>
    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">
    
            <td>
            <input type="number" name="products_id[]" value="@{{ products_id }}">
            </td>
            <td>
            <input type="number" class="total" name="total[]" value="@{{ total }}">
            </td>
        
            <td>
            <i class="removeaddmore" style="cursor:pointer;color:red;">Remove</i>
            </td>
    
        </tr>
   </script>

   <script type="text/javascript">
 
        $(document).on('click','#addMore',function(){
        
            $('.table').show();
    
            var products_id = $("#products_id").val();
            var total = $("#total").val();
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
    
            var data = {
                products_id: products_id,
                total: total
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
        $('.total').each(function(){
            var value = $(this).val();
            if(value.length != 0)
            {
            sum += parseFloat(value);
            }
        });
        $('#estimated_ammount').val(sum);
        }
                          
   </script>

</html>

    




