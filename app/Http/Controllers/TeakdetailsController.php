<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teaks;
use App\Teakdetails;

class TeakdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view ('teakdetails.edit',compact(['data']));
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
        $request->validate([
            'datetime'=>'required',
            'amount'=>'required',
        ]);
        
            $update = Teaks::find($id);
            $update->amount += $request->amount;
            $update->update();

            $data = new Teakdetails();
            $data->teaks_id = $id;
            $data->name = $update->name;
            $data->amount = $request->amount;
            $data->status = 'นำเข้า';
            $data->datetime = $request->datetime;
            $data->save();

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
        //
    }
}
