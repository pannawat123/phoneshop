@extends('layouts.master')
@section('title', 'PhoneShop')
@section('content')
    {!! Form::open(array (
        'action' => 'App\Http\Controllers\phoneController@insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
     )) !!}


<h1>เพิ่มข้อมูลโทรศัพท์</h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('phone') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มข้อมูลโทรศัพท์ </li>
</ul>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>เพิ่มข้อมูล</strong>
        </div>
    </div>

    <div class="panel-body">
        <table>
           
            <tr>
                <td>{{ Form::label('id', 'รหัส') }}</td>
                <td>{{ Form::text('id', Request::old('id'), ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('name', 'ชื่อโทรศัพท์') }}</td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
            </tr>

           <tr>
             <td>{{ Form::label('typephone_id', 'ประเภทโทรศัพท์') }}</td>
             <td>{{ Form::select('typephone_id', $typephones, Request::old('typephone_id'), ['class' => 'form-control']) }}</td>
           </tr>

            <tr>
                 <td>{{ Form::label('price', 'ราคา') }}</td>
                 <td>{{ Form::text('price', Request::old('price'), ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

           

        </table>
        <br>
        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </div>
    </div>
</div>

    {!! Form::close() !!}
@endsection
