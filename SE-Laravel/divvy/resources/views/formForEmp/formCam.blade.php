<?php use App\Models\Campaige; ?>
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
  <title>Campaige request</title>
</head>
<body>
  <div class="col-lg-12 text-center">
    @if(session('success'))
      <h6 class="alert alert-success">{{ session('success') }}</h6> @endif
  </div>
  <div class="col-lg-12 text-center">
  <h2>Campaige request</h2>
</div>



<div class="card text-center">
    <div class="card-body">
      
          <div class="card-body">
          <p class="card-text"><img height="200px" src="{{ asset($campaign->campaign_Image) }}"/></p>   
          <p class="card-text">หมายเลขฟอร์ม : {{ $campaign->id }}</p>
          <p class="card-text">UserID : {{ $campaign->id_user }}</p>
          <p class="card-text">Username : {{ $campaignU->name }}</p>
          <p class="card-text">ชื่อแคมเปญ : {{ $campaign->campaign_name }}</p>
          <p class="card-text">เบอร์ติดต่อ : {{ $campaign->campaign_Tel }}</p>
          <p class="card-text">รายละเอียดแคมเปญ : {{ $campaign->campaign_Detail }}</p>
          <p class="card-text">ชื่อธนาคาร : {{ $campaign->bank_type }}</p>
          <p class="card-text">เลขบัญชี : {{ $campaign->bank_ID }}</p>
          <p class="card-text">จำนวนเงินที่ต้องโอน : {{ $campaign->current_money }}</p>
    </div>
      </hr>
    
    </div>
  </div>
  <br>
  <div class="colunm text-center">
    <a href="{{ url('/formCamAgree/'.$campaign->id) }}" class="btn btn-success " onclick="return confirm('ยืนยันการโอนเงินแล้ว');">โอนแล้ว</a>
    <a href="{{ route('formC') }}" class="btn btn-success" >ย้อนกลับ</a>
  </div> 
  <a></a><br><br><br><br>
</body>
</html>
@endsection