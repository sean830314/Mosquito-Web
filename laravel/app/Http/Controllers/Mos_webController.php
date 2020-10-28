<?php

namespace App\Http\Controllers;
use validate;
use Illuminate\Http\Request;
use DB;
use \App\mosdevice;
use \App\mosdata;
class Mos_webController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       //$mos_device=mos_device::all();
      //  return view('mos_web.mos_device',compact('mos_device'));
        $mos_device=mosdevice::all();
        return view('mos_web.mos_device',compact('mos_device'));
    }
    public function index2()
    {
        //
       //$mos_device=mos_device::all();
      //  return view('mos_web.mos_device',compact('mos_device'));
        $mos_data=mosdata::all();
        return view('mos_web.mos_data',compact('mos_data'));
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
        //驗證Create表單
        $mosdata= mosdata::find($id);
         $this->validate($request, [
        'datadevicenumber' => 'required',
        'count' => 'required',
        'feavalue' => 'required',
        'species' => 'required',
        'intime' => 'required',
        'delaytime' => 'required',
        ]);
        $mosdata->data_device_number=$request->datadevicenumber;
        $mosdata->count=$request->count;
        $mosdata->fea_value=$request->feavalue;
        $mosdata->species=$request->species;
        $mosdata->in_time=$request->intime;
        $mosdata->delay_time=$request->delaytime;
        $mosdata->save();
        return redirect('/mos_web');
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
        $mos_data = DB::table('mosdatas')->where('data_device_number', '=', $id)->get();
        return view('mos_web.data_mos_data',compact('mos_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //執行完後跑Update
    {
        /*由
        <a href="{{'/mos_web/'.$key->id.'/edit'}}" 
        轉址到Edit的網頁進行修改
        Edit送出必須有method_field('PUT')到Update
        和csrf_field()去驗證表單是否有進行填寫資料 
                <form action="{{'/mos_web/'.$item->id}}" method="post">
            <!--<input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            -->
            {{ method_field('PUT') }}
            {{ csrf_field() }}
        */
        $item= mosdata::find($id);       //第$id筆資料
        //return view('mos_web.edit_data',compact('item'));
        return view('mos_web.edit_data',compact('item'));  //route到EDIT 網頁
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
        //驗證Edit表單
        $mosdata= mosdata::find($id);
            $this->validate($request, [
            'datadevicenumber' => 'required',
            'count' => 'required',
            'feavalue' => 'required',
            'species' => 'required',
            'intime' => 'required',
            'delaytime' => 'required',
        ]);
        //更改資料庫
        $mosdata->data_device_number = $request->datadevicenumber;
        $mosdata->count = $request->count;
        $mosdata->fea_value = $request->feavalue;
        $mosdata->species = $request->species;
        $mosdata->in_time = $request->intime;
        $mosdata->delay_time = $request->delaytime;
        $mosdata->save();
        return redirect('/mos_web');    //路由回去首頁
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
        /*
        Button表單設定
        <form method="post" action="{{'/mos_web/'.$key->id}}">
    <div class="form-group">
    DELETE function
    {{ method_field('DELETE') }}
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
        */
        $mosdata= mosdata::find($id);
        $mosdata->delete();
        return redirect('/mos_data');
    }

}
