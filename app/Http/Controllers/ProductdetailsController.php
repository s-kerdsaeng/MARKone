<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Productdetails;

class ProductdetailsController extends Controller
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
        $data=Products::find($id);
        return view ('productdetails.edit',compact(['data']));
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
        $request->validate([
            'datetime'=>'required',
            'amount'=>'required',
        ]);
           // dd($request);
        $update = Products::find($id);
        $update->amount += $request->amount;
        $update->update();    
            $pd = new Productdetails(); 
            $pd->datetime = $request->datetime;
            $pd->bill_id = 0;
            $pd->bill_name = $request->bill_name;
            $pd->product_id = $id;
            $pd->amount = $request->amount;
            $pd->sum = $update->amount;
            $pd->status = 'นำเข้า';
            $pd->save();
        
            return redirect('/products');

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
