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
use App\Diesels;

class DieselsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Diesels::all();
        return view('diesels.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('diesels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*ใช้เช็คการส่งค่า */
        /*  dd($request); */
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'amount'=>'required',
            'sum'=>'required',
            'unit'=>'required'
                ]);
    
                /*สร้างข้อมูล Database  *///dd($request);

               // Products::create($request->all());
                $cd = new Diesels(); 
                $cd->name = $request->name;
                $cd->price = $request->price;
                $cd->amount = $request->amount;
                $cd->sum = $request->amount+$request->sum; 
                $cd->unit = $request->unit;
                $cd->save();


            return redirect('/diesels');
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
        //
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
        //
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
