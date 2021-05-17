<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Productdetails;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*การดึงข้อมูลใช้ all */
        $data=Products::all();
        return view('products.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
                Products::create($request->all());
    
            return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Productdetails::where('product_id','=',$id)->get();
        $name = Products::find($id)->value('name'); //dd($name);
        return view ('products.show',compact(['data','name']));
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
        return view ('products.edit',compact(['data']));
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
        Products::find($id)->update($request->all());

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
        Products::find($id)->delete();
        return redirect('/products');
    }
}
