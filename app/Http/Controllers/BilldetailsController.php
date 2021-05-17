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

class BilldetailsController extends Controller
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
        //dd($id);
        //$billd = Billdetails::find($id)->first();//dd($billd);
        /* $billd = Billdetails::where('id','=',$id)->value('billbs_id');
        $billdd = Billdetails::where('id','=',$id)->value('products_sum');
        $billb = Billbs::find($billd);
        $billb->total = $billb->total - $billdd ;
        $billb->update(); */

        $billd = Billdetails::find($id);
        $billb = Billbs::find($billd->billbs_id);
        $billb->total = $billb->total - $billd->products_sum;
        $billb->update();


        Billdetails::find($id)->delete();
        Billdetails::where('billbs_id','=',$id)->delete();
        return redirect()->back();
    }
}
