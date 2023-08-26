@extends('layouts.master')
@section('title', 'Phoneshop')
@section('content')
    <h1>แก้ไขข้อมูลโทรศัพท์</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('phone') }}">ข้อมูลโทรศัพท์</a></li>
        <li class="active">แก้ไขข้อมูลโทรศัพท์</li>
    </ul>

    {!! Form::model($phones, [
        'action' => 'App\Http\Controllers\phoneController@update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <input type="hidden" name="id" value="{{ $phones->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลโทรศัพท์</strong>
            </div>
        </div>

    <div class="panel-body">
        <table>

            
            <tr>
                <td>{{ Form::label('id', 'รหัสโทรศัพท์') }}</td>
                <td>{{ Form::text('id', $phones->id, ['class' => 'form-control', 'readonly']) }}</td>
            </tr>   

          <tr>
            <td>{{ Form::label('name', 'ชื่อโทรศัพท์') }}</td>
            <td>{{ Form::text('name', $phones->name, ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('typephone_id', 'ประเภทโทรศัพท์') }}</td>
                <td>{{ Form::select('typephone_id', $typephones, $phones->typephone_id, ['class' => 'form-control']) }}</td>

            </tr>

            <tr>
                <td>{{ Form::label('price', 'ราคา') }}</td>
                <td>{{ Form::text('price', $phones->price, ['class' => 'form-control']) }}</td>

            </tr>

            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

            @if ($phones->image_url)
            <tr>
                <td>{{ Form::label('image', 'รูปภาพสินค้า ') }}</td>
                <td><img src="{{ $phones->image_url }}" alt="" width="100"></td>
            </tr>
            @endif

            
           


        </table>
    </div>
    <div class="panel-footer">
        <button type="reset" class="btn btn-danger">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>

</div>
</div>



    {!! Form::close() !!}
@endsection
