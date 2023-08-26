@extends('layouts.master')
@section('title', 'Phoneshop')
@section('content')
    <h1>แก้ไขประเภท</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('typephone') }}">ประเภท</a></li>
        <li class="active">แก้ไขประเภท</li>
    </ul>

    {!! Form::model($typephones, [
        'action' => 'App\Http\Controllers\TypephoneController@update',
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

    <input type="hidden" name="id" value="{{ $typephones->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ประเภท</strong>
            </div>
        </div>

    <div class="panel-body">
        <table>
            <tr>
                <td>{{ Form::label('id', 'รหัสโทรศัพท์') }}</td>
                <td>{{ Form::text('id', $typephones->id, ['class' => 'form-control', 'readonly']) }}</td>
            </tr>   

          <tr>
            <td>{{ Form::label('name', 'ชื่อโทรศัพท์') }}</td>
            <td>{{ Form::text('name', $typephones->name, ['class' => 'form-control']) }}</td>
            </tr>


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
