<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\mosdevice;
use \App\mosdata;
class My_googlmapcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mos_device=mosdevice::all();
        $k=0;
        foreach($mos_device as $key){
        $data[$k]['location']=$key->location;
        $NewString = explode(",", $data[$k]['location'] ) ;
        $data[$k]['x_location']= $NewString[0];
        $data[$k]['y_location']= $NewString[1];
        $data[$k]['loc_addr']=$key->device_number;
        $k++;
        }
        //$json=json_encode($data);
        //json_encode($json, JSON_UNESCAPED_UNICODE); 
        //return $data;
        //return $data;
        //return $data[1]['device_number'];

         //return        $data[1]['device_number'];
        //$data=json_encode($data);
        //json_encode($data, JSON_UNESCAPED_UNICODE); 
        //$data=urldecode(json_encode($data));
        //return urldecode(json_encode($data));
        return view('mos_web.mos_goolgemap',compact('data'));
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
        //return $id;
        $index_loc = DB::table('mosdevices')->where('location', '=', '22.994347,120.218050')->first()->device_number;
        $mosdata=DB::table('mosdatas')->where('data_device_number', '=',  $index_loc)->get();
        return view('layout.mos_device_distributed_highchart',compact('mosdata'));
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
