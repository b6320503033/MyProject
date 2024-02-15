@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('แบบฟอร์มยืนยันตัวตน') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form class="was-validated" action="{{route('submit-form')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 ">
                            <div class="col-sm-2">
                                <label for="nameTitle" class="form-label">คำนำหน้าชื่อ</label>
                                <select class="mb-3 form-select" name="nameTitle" id="nameTitle" required> 
                                    <option selected disabled value="">คำนำหน้าชื่อ</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นาย">นาย</option>
                                </select>
                                <div class="invalid-feedback">กรุณาเลือกคำนำหน้าชื่อ</div>
                            </div>
                            <div class="col-sm">
                                <label for="firstName" class="form-label"> ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ" name="firstName" id="firstName" required>
                                <div class="invalid-feedback">กรุณากรอกชื่อของท่าน</div>
                            </div>
                            <div class="col-sm">
                                <label for="lasName" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" placeholder="นามสกุล" name="lasName" id="lasName" required>
                                <div class="invalid-feedback">กรุณากรอกนามสกุลของท่าน</div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="birthdate" class="form-label">วัน/เดือน/ปีเกิด</label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate" required>
                                <div class="invalid-feedback">กรุณากรอกวัน/เดือน/ปีเกิดของท่าน</div>
                            </div>
                            
                            <div class="col-sm">
                                <label for="phoneNumber" class="form-label">เบอร์มือถือ</label>
                                <input type="text" class="form-control" placeholder="เบอร์มือถือ" name="phoneNum" id="phoneNum" required>
                                <div class="invalid-feedback">กรุณากรอกเบอร์มือถือหรือเบอร์ที่ติดต่อได้</div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-3">
                                <label for="bank" class="form-label">ธนาคาร</label>
                                <select class="mb-3 form-select" name="bank" id="bank" required>
                                    <option selected disabled value="">ธนาคาร</option>
                                    <option value="SCB">SCB</option>
                                    <option value="BBL">BBL</option>
                                    <option value="KTB">KTB</option>
                                </select>
                                <div class="invalid-feedback">กรุณาเลือกธนาคารของท่าน</div>
                            </div>
                            <div class="col-sm">
                                <label for="bankNum" class="form-label">เลขที่บัญชี</label>
                                <input type="text" class="form-control" placeholder="เลขที่บัญชี" name="bankNum" id="bankNum" required>
                                <div class="invalid-feedback">กรุณากรอกเลขบัญชีของท่าน</div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="address" class="form-label">ที่อยู่</label>
                                <input type="text" class="form-control" placeholder="ที่อยู่ปัจจุบัน" name="address" id="address" required>
                                <div class="invalid-feedback">กรุณาที่อยู่ปัจจุบันของท่าน</div>
                            </div>
                            <div class="col-sm">
                                <label for="imageValidate" class="form-label">ภาพถ่ายคู่กับบัตรประชาชน/พาสต์ปอร์ต</label>
                                <input class="form-control" type="file" id="imageValidate" name="imageValidate" required>
                                <div class="invalid-feedback">กรุณาเลือกภาพถ่ายของท่าน</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">ตกลง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection