<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trucks;

class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*การดึงข้อมูลใช้ all */
        $data=Trucks::all();
        return view('trucks.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trucks.create');
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
        'number'=>'required',
        'weight'=>'required',
        'expenses'=>'required'
            ]);

            /*สร้างข้อมูล Database  */
            Trucks::create($request->all());

        return redirect('/trucks');
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
        /** ค้นหาข้อมูลก่อน */
        $data=Trucks::find($id);
        return view ('trucks.edit',compact(['data']));
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
        /*ใช้เช็คการส่งค่า */
         /*  dd($request); */
         $request->validate([
            'name'=>'required',
            'number'=>'required',
            'weight'=>'required',
            'expenses'=>'required'
        ]);

        
        /*แก้ไขข้อมูล Database  */
        Trucks::find($id)->update($request->all());

        return redirect('/trucks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trucks::find($id)->delete();
        return redirect('/trucks');
    }
}
