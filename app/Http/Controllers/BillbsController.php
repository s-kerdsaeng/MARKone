<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billbs;
use App\Trucks;
use App\Drivers;
use App\Mechanics;
use App\Products;
use App\Productdetails;
use App\Billdetails;
use DB;

class BillbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*การดึงข้อมูลใช้ all */
        //$data=Billbs::all();//dd($data);
        $data=Billbs::paginate(5);
        return view('billbs.index',compact(['data']));
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
        return view('billbs.create',compact(['ddtrucks','ddmechanics','dddrivers','ddproducts']));
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
        $request->validate([
            'name'=>'required',
            'datetime'=>'required',
            'trucks_id'=>'required',
            'mechanics_id'=>'required',
            'drivers_id'=>'required',
            'task_name' => 'required',
            'cost' => 'required'
         ]);
         $bills = new Billbs();
         $bills->name = $request->name;
         $bills->datetime = $request->datetime;
         $bills->trucks_id = $request->trucks_id;
         $bills->trucks_name = Trucks::where('id','=',$bills->trucks_id)->value('name'); 
         $bills->mechanics_id = $request->mechanics_id;
         //$bills->mechanics_name = Mechanics::find($bills->mechanics_id)->first()->name;
         $bills->mechanics_name = Mechanics::where('id','=',$bills->mechanics_id)->value('name');
         $bills->drivers_id = $request->drivers_id;
         //$bills->drivers_name = Drivers::find($bills->drivers_id)->first()->name;
         $bills->drivers_name = Drivers::where('id','=',$bills->drivers_id)->value('name');
         $bills->total = 0; //dd($bills);
         $bills->save(); 
         $count = count($request->task_name);
        
         for ($i=0; $i < $count; $i++) { 
           $billdetails = new Billdetails();
           $billdetails->billbs_id = $bills->id;
           $billdetails->products_id = $request->task_name[$i];
           //$billdetails->products_name = Products::find($billdetails->products_id)->first()->name;
           $billdetails->products_name = Products::where('id','=',$billdetails->products_id)->value('name');
           //$billdetails->products_price = Products::find($billdetails->products_id)->first()->price;
           $billdetails->products_price = Products::where('id','=',$billdetails->products_id)->value('price');
           $billdetails->products_amount = $request->cost[$i];
           $billdetails->products_sum =  $billdetails->products_amount * $billdetails->products_price;
           $bills->total += $billdetails->products_sum;
              $updatepd = Products::find($billdetails->products_id); //dd($updatepd);
              $updatepd->amount -= $request->cost[$i];
              $updatepd->update();
                    $cpd = new Productdetails();
                    $cpd->bill_id = $bills->id;
                    $cpd->datetime = $bills->datetime;
                    $cpd->bill_name = $bills->name;
                    $cpd->product_id = $billdetails->products_id;
                    $cpd->amount = $billdetails->products_amount;
                    $cpd->sum = $updatepd->amount;
                    $cpd->status = 'นำออก';
                    $cpd->save();
           $billdetails->save(); //dd($billdetails);
         }
            
         $billsup = Billbs::find($bills->id);
         $billsup->total = $bills->total;
         $billsup->update();

         return redirect('/billbs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data=Billbs::find($id);
        $datadetails = Billdetails::where('billbs_id','=',$id)->get();
        //$datadetails = Billdetails::find($datadetails);
        //dd($datadetails);
        $ddtrucks = Trucks::all();
        $ddmechanics = Mechanics::all();
        $dddrivers = Drivers::all();
        $ddproducts = Products::all();
        return view ('billbs.edit',compact(['data','ddtrucks','ddmechanics','dddrivers','ddproducts','datadetails']));
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
        //dd($request);
        $bills = Billbs::find($id);//dd($bills);
        $bills->name = $request->name;
        $bills->datetime = $request->datetime;
        $bills->trucks_id = $request->trucks_id;
        $bills->trucks_name = Trucks::where('id','=',$bills->trucks_id)->value('name'); 
        $bills->mechanics_id = $request->mechanics_id;
        //$bills->mechanics_name = Mechanics::find($bills->mechanics_id)->first()->name;
        $bills->mechanics_name = Mechanics::where('id','=',$bills->mechanics_id)->value('name');
        $bills->drivers_id = $request->drivers_id;
        //$bills->drivers_name = Drivers::find($bills->drivers_id)->first()->name;
        $bills->drivers_name = Drivers::where('id','=',$bills->drivers_id)->value('name');
        

        if($request->cost != null){
            $count = count($request->task_name);
            for ($i=0; $i < $count; $i++) { 
                $billdetails = new Billdetails();
                $billdetails->billbs_id = $bills->id;
                $billdetails->products_id = $request->task_name[$i];
                //$billdetails->products_name = Products::find($billdetails->products_id)->first()->name;
                $billdetails->products_name = Products::where('id','=',$billdetails->products_id)->value('name');
                //$billdetails->products_price = Products::find($billdetails->products_id)->first()->price;
                $billdetails->products_price = Products::where('id','=',$billdetails->products_id)->value('price');
                $billdetails->products_amount = $request->cost[$i];
                $billdetails->products_sum =  $billdetails->products_amount * $billdetails->products_price;
                $bills->total += $billdetails->products_sum;
                $billdetails->save(); //dd($billdetails);
              }
                 
              $billsup = Billbs::find($bills->id);
              $billsup->total = $bills->total;
              $billsup->update();
         
        } else {
          //  $billup = billbs::
        }
        $bills->update();
        return redirect('/billbs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Billbs::find($id)->delete();
        Billdetails::where('billbs_id','=',$id)->delete();
        return redirect('/billbs');
    }

    /* public function destroybilldetails($id)
    {
        Billdetails::find($id)->delete();
        Billdetails::where('billbs_id','=',$id)->delete();
        return redirect('/billbs');
    } */

    //destroybilldetails
}
