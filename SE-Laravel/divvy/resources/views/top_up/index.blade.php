<?php use App\Http\Controllers\Top_upController; ?>
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
<div class="container mt-2">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>เติมเงิน</h2>
      
      </div>
      <div>
      </div>
      <div class="col-lg-12 text-center">
      @if(session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> @endif
     
    </div>
     <div>
        @if (session('status'))
      <div class="alert alert-success">
        {{ session('status')}}
      </div>
       @endif
    </div>

      <form action="{{ url('top_ups') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="form-group my-3">
            <strong>จำนวนเงิน</strong>
            <input type="text" name="amount" class="form-control" placeholder="จำนวนเงิน">
            @error('amount')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            </div>
          </div>

          <div class="col-md-12">
          <div class="form-group my-3">
            <strong>วันที่โอนเงิน</strong>
            <input type="date" name="transfer_date" class="form-control" placeholder="วันที่โอน">
            @error('transfer_date')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            </div>
          </div>

          <div class="col-md-12">
          <div class="form-group my-3">
            <strong>เวลาที่โอนเงิน</strong>
            <input type="text" name="transfer_time" class="form-control" placeholder="เวลาที่โอน">
            @error('transfer_time')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            </div>
          </div>

          <div class="col-md-12">
          <div class="form-group my-3">
            <strong>แนบสลิปการโอน</strong>
            <input type="file" name="money_slip" class="form-control streched-link" accept="image/jpeg, image/png">
            @error('money_slip')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            </div>
          </div>
   
          <input type="hidden" name="status" value="non">
          <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('profile.show') }}" class="btn btn-success">ย้อนกลับ</a>            
          </div>

          </div>
      </form>

    </div>
  </div>

  
</body>
</html>
@endsection