@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('แบบฟอร์มยืนยันตัวตน') }}</div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            ไม่มีข้อมูลที่ต้องตรวจสอบ
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection