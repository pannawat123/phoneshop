@extends('layouts.master')
@section('title', 'Phoneshop')
@section('content')
    <div class="container">
        <h1>รายการ</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title "><strong>รายการ</strong></div>
            </div>
            <div class="panel-body">
                <a href="{{URL::to('phone/edit')}}" class="btn btn-success pull-right">เพิ่มข้อมูล</a>
                <form action="{{URL::to('phone/search')}}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
                <br>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th class="">รูป</th>
                            <th>รหัส</th>
                            <th>สินค้า</th>
                            <th>ราคา</th>
                            <th>ประเภท</th>
                            <th>การทำงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phones as $p)
                            <tr>
                                <td><img src="/{{ $p->image_url }}" alt="" width="100"></td>

                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ number_format($p->price, 2) }}</td>
                                <td>{{ $p->typephone->name }}</td>
                                <td class="bs-center">
                                    <a href="{{ URL::to('phone/edit/' . $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i> แก้ไข</a>
                                    <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}">
                                        <i class="fa fa-trash"></i> ลบ</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th colspan="3">รวม</th>
                        <th class="bs-price">{{ number_format($phones->sum('price'), 2) }}</th>
                    </tr>

                </table>
            </div>
            
            <div class="panel-footer ">
                <span>แสดงข้อมูลจํานวน {{ count($phones) }} รายการ</span>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).attr('id-delete');
                if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                    window.location.href = '/phone/remove/' + id;
                }
            });
        });
    </script>
@endsection
