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
<div class="container mt-2 text-center">
  <div class="container mt-2 ">
    <div class="row">
      <div class="col-lg-12 text-center">
        @if(session('success'))
          <h6 class="alert alert-success">{{ session('success') }}</h6> @endif
        <h2>Withdraw request</h2>
      </div>
      
        <table class="table table-bordered">
          <tr>
            <th>No.</th>
            <th>ID User</th>
            <th>จำนวนเงิน</th>
            <th>เหตุผล</th>
            <th width="200px">Action</th>
          </tr>
          @foreach($withdraws as $with)
            <tr>
              <td>{{ $with->id }}</td>
              <td>{{ $with->id_user }}</td>
              <td>{{ $with->amount }}</td>
              <td>{{ $with->reason }}</td>
              <td>         
                <a class="btn btn-warning btn-flat btn-sm" href="{{ url('/formWith/'.$with->id_user.'/'.$with->id) }}" title="View withdraw">
                 ข้อมูล
                </a>
                @csrf
              </td>   
            </tr>
            @endforeach
        </table>
        {!! $withdraws->links('pagination::bootstrap-5') !!}

    </div>
  </div>
</div>
<a href="{{ route('monet') }}" class="btn btn-success">ย้อนกลับ</a> 
</body>
</html>
@endsection
