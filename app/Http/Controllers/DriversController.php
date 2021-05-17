<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drivers;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*การดึงข้อมูลใช้ all */
        $data=Drivers::all();
        return view('drivers.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
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
            'phone'=>'required'
            ]);

            /*สร้างข้อมูล Database  */
            Drivers::create($request->all());

             return redirect('/drivers');
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
        $data=Drivers::find($id);
        return view ('drivers.edit',compact(['data']));
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
            'phone'=>'required'
        ]);

        /*แก้ไขข้อมูล Database  */
        Drivers::find($id)->update($request->all());

        return redirect('/drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drivers::find($id)->delete();
        return redirect('/drivers');
    }
}
