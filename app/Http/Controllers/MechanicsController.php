<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mechanics;

class MechanicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*การดึงข้อมูลใช้ all */
        $data=Mechanics::all();
        return view('mechanics.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('mechanics.create');
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
        Mechanics::create($request->all());

        return redirect('/mechanics');
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
        $data=Mechanics::find($id);
        return view ('mechanics.edit',compact(['data']));

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
            Mechanics::find($id)->update($request->all());

            return redirect('/mechanics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mechanics::find($id)->delete();
        return redirect('/mechanics');
    }
}
