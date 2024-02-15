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
  <title>History request</title>
</head>
<body>
    
<div class="container mt-2 text-center">
    <h2>History request</h2>
  <div class="container mt-2 ">
    <div class="row">

      
        <table class="table table-bordered">
          <tr>
            <th>No.</th>
            <th>จำนวนเงิน</th>
            <th>ชนิด</th>
            <th>สถานะ</th>
          </tr>
          @foreach($history_users as $his)
            <tr>
              <td>{{ $his->id }}</td>
              <td>{{ $his->amount }}</td>
              <td>{{ $his->type }}</td>
              <td>{{ $his->status }}</td> 
            </tr>
            @endforeach
        </table>
        {!! $history_users->links('pagination::bootstrap-5') !!}

    </div>
  </div>
  <a href="{{ route('profile.show') }}" class="btn btn-success" >ย้อนกลับ</a>
</div>
</body>
</html>
@endsection