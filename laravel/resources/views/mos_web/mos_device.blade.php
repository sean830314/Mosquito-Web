@extends('layout.mos_web')
@section('title','設備頁面')
@section('active')
<li class="active"><a href="#">設備頁面</a></li>
<li><a href="mos_data">資料頁面</a></li>
<li><a href="mos_gmap">分佈圖</a></li>
@endsection
@section('body')
<tr><td>編號</td><td>型號</td><td>電量</td><td>狀態</td><td>維修記錄</td><td>維修時間</td><td>位置</td><td>負責人</td><td>測試</td><td>資料</td></tr>
@foreach($mos_device as $key)
<tr><td>{{$key->device_number}}</td>
<td>{{$key->device_model}}</td>
<td>{{$key->electricity}}</td>
<td>{{$key->status}}</td>
<td>{{$key->maintenance_records}}</td>
<td>{{$key->Maintenance_time}}</td>
<td>{{$key->location}}</td>
<td>{{$key->keeper}}</td>
<td><a href="" role="btn" class="btn btn-danger">測試</a></td>
<td><a href="{{'./mos_web/'.$key->device_number}}" role="btn" class="btn btn-danger">資料</a></td>
</tr>
@endforeach
@endsection