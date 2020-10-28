@extends('layout.mos_web')
@section('title','資料頁面')
@section('active')
<li><a href="../mos_web">設備頁面</a></li>
<li class="active"><a href="#">資料頁面</a></li>
<li><a href="../mos_gmap">設備分佈圖</a></li>
@endsection
@section('body')
<tr><td>編號</td><td>筆數</td><td>特徵值</td><td>蚊子種類</td><td>in time</td><td>delay time</td><td>in_database_time</td><td>編輯</td><td>刪除</td></tr>
@foreach($mos_data as $key)
  <tr><td>{{$key->data_device_number}}</td>
  <td>{{$key->count}}</td>
  <td>{{$key->fea_value}}</td>
  <td>{{$key->species}}</td>
  <td>{{$key->in_time}}</td>
  <td>{{$key->delay_time}}</td>
  <td>{{$key->created_at}}</td>
<td><a href="{{route('mos_web.index').'/'.$key->id.'/edit'}}" role="btn" class="btn btn-danger">Edit</a></td>
<td>
<form method="post" action="{{route('mos_web.index').'/'.$key->id}}">
    <div class="form-group">
    {{ method_field('DELETE') }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <div class="form-group">
       <button type="submit" class="btn btn-primary">Delete</button>
       </div>
    </form>
    </td>

  </tr>
@endforeach
@endsection