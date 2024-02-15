<?php use App\Models\Top_up; ?>
<?php use Illuminate\Support\Facades\Auth; ?>
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Top up request</title>
</head>
<body>

<div class="card text-center">
  <div class="card-header">คำร้องขอเติมเงิน</div>
  <div class="card-body">
        
        <div class="card-body">
        <p class="card-text">หมายเลขฟอร์ม : {{ $top_up->id }}</p>
        <p class="card-text">Username : {{ $top_upU->name }}</p>
        <p class="card-text">UserID : {{ $top_up->id_user }}</p>
        <p class="card-text">จำนวนเงินที่เติม : {{ $top_up->amount }}</p>
        <p class="card-text">วันที่โอน : {{ $top_up->transfer_date }}</p>
        <p class="card-text">เวลาที่โอน : {{ $top_up->transfer_time }}</p>
        <p class="card-text"><img height="500px" src="{{ asset('/uploads/top_ups/'.$top_up->money_slip) }}"/></p>      
  </div>
    </hr> 
  </div>
</div>
<br>
<div class="column text-center">
  @php
      $sumAmount = ($top_up->amount)+($top_upU->amount_user);
      
  @endphp
  <a href="{{ url('/formTopAdd/'.$top_up->id_user.'/'.$top_up->id.'/'.$sumAmount.'/'.$top_up->amount) }}" class="btn btn-success" onclick="return confirm('ยืนยันการเติมเงิน');">เติมเงิน</a>
  <a href="{{ url('/formTopReject/'.$top_up->id_user.'/'.$top_up->id.'/'.$top_up->amount) }}" class="btn btn-success" onclick="return confirm('ยืนยันการปฏิเสธ!');">ไม่ผ่าน</a>
  <a href="{{ route('formT') }}" class="btn btn-success" >ย้อนกลับ</a>
</div> 
<a></a><br><br><br><br>
</body>
</html>
@endsection


