<?php use Illuminate\Support\Facades\Auth; ?>
<?php use App\Models\Withdraw; ?>
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Withdraw request</title>
</head>
<body>
  <div class="col-lg-12 text-center">
    @if(session('success'))
      <h6 class="alert alert-success">{{ session('success') }}</h6> @endif
  </div>
  <div class="col-lg-12 text-center">
  <h2>Withdraw request</h2>
</div>



<div class="card text-center">
    <div class="card-header">คำร้องขอคืนเงิน</div>
    <div class="card-body">
      
          <div class="card-body">
          <p class="card-text">หมายเลขฟอร์ม : {{ $withdraw->id }}</p>
          <p class="card-text">UserID : {{ $withdraw->id_user }}</p>
          <p class="card-text">Username : {{ $withdrawU->name }}</p>
          <p class="card-text">จำนวนเงินที่userมี : {{ $withdrawU->amount_user }}</p>
          <p class="card-text">จำนวนเงินที่ถอน : {{ $withdraw->amount }}</p>
          <p class="card-text">เหตุผลที่ถอน : {{ $withdraw->reason }}</p>
          <p class="card-text">ชื่อธนาคาร : {{ $withdraw->bank_name }}</p>
          <p class="card-text">เลขบัญชีธนาคาร : {{ $withdraw->Baccount_number }}</p>
  
    </div>
        
      </hr>
    
    </div>
  </div>
  <br>
  <div class="colunm text-center">
    @php
    $sumAmount = ($withdrawU->amount_user)-($withdraw->amount); 
    @endphp
    <a href="{{ url('/formWithReduce/'.$withdraw->id_user.'/'.$withdraw->id.'/'.$sumAmount.'/'.$withdraw->amount) }}" class="btn btn-success " onclick="return confirm('ยืนยันการโอนเงินคืนแล้ว');">โอนแล้ว</a>
    <a href="{{ url('/formWithReject/'.$withdraw->id_user.'/'.$withdraw->id.'/'.$withdraw->amount) }}" class="btn btn-success" onclick="return confirm('ยืนยันการปฏิเสธ!');">ไม่ผ่าน</a>
    <a href="{{ route('formW') }}" class="btn btn-success" >ย้อนกลับ</a>
  </div> 
  <a></a><br><br><br><br>
</body>
</html>
@endsection