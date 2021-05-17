<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billas;
use App\Trucks;
use App\Drivers;
use App\Mechanics;
use App\Products;
use DB;

class BillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*การดึงข้อมูลใช้ all */
        $data=Billas::all();//dd($data);
        return view('billas.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ddtrucks = Trucks::all();
        $ddmechanics = Mechanics::all();
        $dddrivers = Drivers::all();
        $ddproducts = Products::all();
        return view('billas.create',compact(['ddtrucks','ddmechanics','dddrivers','ddproducts']));
 
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        /*ใช้เช็คการส่งค่า */
        /*  dd($request); */
        $request->validate([
            'name'=>'required',
            'datetime'=>'required',
            'trucks_id'=>'required',
            'mechanics_id'=>'required',
            'drivers_id'=>'required',
            'products_id'=>'required',
            'total'=>'required'
                ]);
            
                $bills = new Billas();
                $bills->name = $request->name;
                $bills->datetime = $request->datetime;
                $bills->trucks_id = $request->trucks_id;
                $bills->trucks_name = Trucks::where('id','=',$bills->trucks_id)->value('name'); 
                $bills->mechanics_id = $request->mechanics_id;
                $bills->mechanics_name = Mechanics::find($bills->mechanics_id)->first()->name;
                $bills->drivers_id = $request->drivers_id;
                $bills->drivers_name = Drivers::find($bills->drivers_id)->first()->name;
                $bills->products_id = $request->products_id;
                $bills->products_name = Products::find($bills->products_id)->first()->name; //dd($bills->products_name);
                $bills->total = $request->total;
                $bills->save();
                /*สร้างข้อมูล Database  */
                //Billas::create($request->all());
    
            return redirect('/billas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Billas::find($id);
        $ddtrucks = Trucks::all();
        $ddmechanics = Mechanics::all();
        $dddrivers = Drivers::all();
        $ddproducts = Products::all();
        return view ('billas.edit',compact(['data','ddtrucks','ddmechanics','dddrivers','ddproducts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $bills = Billas::find($id);//dd($bills);
        $bills->name = $request->name;
        $bills->datetime = $request->datetime;
        $bills->trucks_id = $request->trucks_id;
        $bills->trucks_name = Trucks::where('id','=',$bills->trucks_id)->value('name'); 
        $bills->mechanics_id = $request->mechanics_id;
        $bills->mechanics_name = Mechanics::find($bills->mechanics_id)->first()->name;
        $bills->drivers_id = $request->drivers_id;
        $bills->drivers_name = Drivers::find($bills->drivers_id)->first()->name;
        $bills->products_id = $request->products_id;
        $bills->products_name = Products::find($bills->products_id)->first()->name; //dd($bills->products_name);
        $bills->total = $request->total;
        $bills->update();
        return redirect('/billas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
