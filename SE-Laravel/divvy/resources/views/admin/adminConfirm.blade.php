@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('ข้อมูลผู้ใช้ที่ต้องการยืนยันตัวตน') }}</div>
                <div class="card-body">
                    <form action="{{route('adminAgree')}}" method="POST">
                        @csrf
                        @foreach($confirmForm as $row)
                        <img class="mb-3" src="{{asset($row->image)}}" alt="" width="400 px" hight="400 px">
                        <h6 class="mb-3">ชื่อ :<span class=""> {{$row->nameTitle}}{{$row->firstName}}   {{$row->lasName}}</span></h6>
                        <h6 class="mb-3">วัน/เดือน/ปีเกิด : <span class=""> {{$row->birthDate}}</span></h6>
                        <h6 class="mb-3">ที่อยู่ : <span class=""> {{$row->address}}</span></h6>
                        <h6 class="mb-3">เบอร์โทร : <span class=""> {{$row->phone_Number}}</span></h6>
                        <h6 class="mb-3">ธนาคาร : <span class=""> {{$row->bank}}</span></h6>
                        <h6 class="mb-3">หมายเลขบัญชี : <span class=""> {{$row->bank_num}}</span></h6>
                        <select class="mb-3 form-select" name="pass" id="pass" required> 
                            <option selected disabled value="">กรุณาใส่ผลการตรวจสอบ</option>
                            <option value="1">ผ่าน</option>
                            <option value="2">ไม่ผ่าน</option>
                        </select>
                        <div class="invalid-feedback">กรุณาเลือกคำนำหน้าชื่อ</div>
                        <input type="hidden" name="userId" value={{$row->userId}}>
                        <button type="submit" class="btn btn-success">ยืนยันการตรวจสอบ</button>
                        @endforeach
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection