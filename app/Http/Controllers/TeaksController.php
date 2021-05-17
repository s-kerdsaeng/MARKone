<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teaks;
use App\Teakdetails;

class TeaksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Teaks::all();
        return view('teaks.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teaks.create');
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
            'unit'=>'required'
                ]);
    
                /*สร้างข้อมูล Database  */
                Teaks::create($request->all());
    
            return redirect('/teaks');
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
        $data = Teaks::find($id);
        return view ('teaks.edit',compact(['data']));

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
            'price'=>'required',
            'amount'=>'required',
            'unit'=>'required'
        ]);

        
        /*แก้ไขข้อมูล Database  */
        Teaks::find($id)->update($request->all());

        return redirect('/teaks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teaks::find($id)->delete();
        return redirect('/teaks');
    }
}
