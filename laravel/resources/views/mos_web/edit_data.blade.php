@extends('layout.mos_web')
@section('title','資料頁面')
@section('active')
<li><a href="{{ route('mos_web.index') }}">設備頁面</a></li>
<li class="active"><a href="#">資料頁面</a></li>
<li><a href="{{ route('mos_gmap.index')}}">設備分佈圖</a></li>
@endsection
@section('body')
<form action="{{'../'.$item->id}}" method="post">
            <!--<input name="_method" type="hidden" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            -->
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <label>data_device_number:</label>
            <input type="text" name="datadevicenumber" class="form-control" required="required" value="{{ $item->data_device_number }}">
            <br>
            <label>count:</label>
            <input type="text" name="count" class="form-control" required="required" value="{{ $item->count }}">
            <br>
            <label>fea_value:</label>
            <input type="text" name="feavalue" class="form-control" required="required" value="{{ $item->fea_value }}">
            <br>
            <label>species:</label>
            <input type="text" name="species" class="form-control" required="required" value="{{ $item->species }}">
            <br>
            <label>in_time:</label>
            <input type="text" name="intime" class="form-control" required="required" value="{{ $item->in_time }}">
            <br>
            <label>delay_time:</label>
            <input type="text" name="delaytime" class="form-control" required="required" value="{{ $item->delay_time }}">
            <br>
            <button class="btn btn-lg btn-info">Update data</button>
</form>

@if (count($errors)>0)
	<div class="alert alert-danger">
 	@foreach ($errors->all() as $error)
 	{{$error}}</br>
 	@endforeach
 	</div>
 @endif
 @endsection
