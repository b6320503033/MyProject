<?php use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Auth; ?>

@extends('layouts.app')

@section('content')
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container mt-2">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>คำร้องถอนเงิน</h2>
      
      </div>
      <div>
      </div>
     <div>
        @if (session('status'))
      <div class="alert alert-success">
        {{ session('status')}}
      </div>
       @endif
    </div>
    <div class="col-lg-12 text-center">
      @if(session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> @endif
  
    </div>
    <div class="col-lg-12 text-center">
      @if(session('error'))
        <h6 class="alert alert-danger">{{ session('error') }}</h6> @endif
    </div>

      <form action="{{ url('withdraw') }}" method="POST" enctype="multipart/form-data">
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
            <strong>เหตุผลที่ถอน</strong>
            <input type="text" name="reason" class="form-control" placeholder="เหตุผลที่ถอน">
            @error('reason')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
            </div>
          </div>
          

          <div class="col-md-12">
            <div class="form-group my-3">
              <strong>ชื่อธนาคาร</strong>
              <input type="text" name="bank_name" class="form-control" placeholder="ชื่อธนาคาร">
              @error('bank_name')
              <div class="alert alert-danger">{{ $message}}</div>
              @enderror
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group my-3">
                <strong>เลขบัญชีธนาคาร</strong>
                <input type="text" name="Baccount_number" class="form-control" placeholder="เลขบัญชี">
                @error('Baccount_number')
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