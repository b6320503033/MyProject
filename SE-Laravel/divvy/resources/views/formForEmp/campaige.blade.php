<?php use Illuminate\Support\Facades\Auth; 
use App\Models\Campaign;?>
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
<div class="container mt-2 text-center">
  <div class="container mt-2 ">
    <div class="row">
    <div class="col-lg-12 text-center">
    @if(session('success'))
      <h6 class="alert alert-success">{{ session('success') }}</h6> @endif
  </div>
  <div class="col-lg-12 text-center">
  <h2>Campaige request</h2>
</div>
      
        <table class="table table-bordered">
          <tr>
            <th>No.</th>
            <th>ชื่อแคมเปญ</th>
            <th>ID User</th>
            <th>จำนวนเงิน</th>
            <th width="200px">Action</th>
          </tr>
          @foreach($campaign as $Cam)
            <tr>
              <td>{{ $Cam->id }}</td>
              <td>{{ $Cam->campaign_name }}</td>
              <td>{{ $Cam->id_user }}</td>
              <td>{{ $Cam->goals }}</td>
              <td>         
                <a class="btn btn-warning btn-flat btn-sm" href="{{ url('/formCam/'.$Cam->id) }}" title="View Campaign">
                 ข้อมูล
                </a>
                @csrf
              </td>   
            </tr>
            @endforeach
        </table>

    </div>
  </div>
</div>
<a href="{{ route('monet') }}" class="btn btn-success">ย้อนกลับ</a>  
</body>
</html>
@endsection
