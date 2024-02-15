@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('แบบฟอร์มยืนยันตัวตน') }}</div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">user id</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">เวลา</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($index as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->userId}}</td>
                            <td>{{$row->nameTitle}}{{$row->firstName}}</td>
                            <td>{{$row->lasName}}</td>
                            <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                            <td><a href="{{url('/admin-formVal/confirm/'.$row->userId)}}" class="btn btn-primary">เรียกดูข้อมูล</a></td>
                        </tr>
                        @endforeach
                    </tbody>
  
                </table>
            </div>
        </div>
    </div>
</div>
@endsection