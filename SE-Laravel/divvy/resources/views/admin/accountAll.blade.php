@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
  <style>
            .container {
                max-width: none;
                width: 1200px;
            }

           .row1{
                width: 1200px;
                display: flex;
                justify-content: center;
           }
        </style>
</head>


<body>

    <!-- ตัวช่วยการค้นหา-->
    <div class="border-top-0 m-0 py-2 pl-5 w-100" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-1 text-right" style="">
                    <h4 class="">Filter</h4>
                </div>
                <div class="col-md-3" style="">
                    @if ($type === 1)
                        <form class="form-inline" action="{{ route('adminSearchAccount') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="query" placeholder="Search...">
                                <div class="input-group-append"><button type="submit" class="btn btn-primary"><i
                                            class="fa fa-search"></i></button></div>
                            </div>
                        </form>
                    @else
                        <form class="form-inline" action="{{ route('adminSearchBanAccount') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="query" placeholder="Search...">
                                <div class="input-group-append"><button type="submit" class="btn btn-primary"><i
                                            class="fa fa-search"></i></button></div>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="col-md-3" style=""></div>
            </div>
        </div>
    </div>
    <div class="mx-1">
        <div class="container" style="">
            <!-- row-->

            <div class="col">
                <div class="row ">
                    <!-- Ban-->
                    <!--  foreach-->
                    @foreach ($accounts as $account)
                        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img
                                class="img-fluid d-block w-75 mx-auto" src="{{ asset($account->image) }}"
                                style="">
                            <h5 class="text-center mt-2 w-100">{{ $account->name }}</h5>
                            <p class="">ชื่อจริง : {{ $account->firstname }}</p>
                            <p class="">นามสกุล : {{ $account->lasName }}</p>
                            <p class="">วันเกิด : {{ $account->birthDate }}</p>
                            <p class="">อีเมล : {{ $account->email }}</p>
                            <p class="">เบอร์โทรศัพท์ : {{ $account->phone_Number }}</p>
                            <h5 class="text-right">{{ $account->amount_user }}</h5>
                            <div class="row">
                                @if ($account->ban_status === 1)
                                    <div class="col-md-4"><a class="btn btn-primary text-white"
                                            onclick="window.location='{{ route('adminBan') }}?id={{ $account->id }}'"
                                            style="">detail&gt;</a></div>
                                @else
                                    <div class="col-md-4"><a class="btn btn-primary text-white"
                                            onclick="window.location='{{ route('adminAccount') }}?id={{ $account->id }}'"
                                            style="">detail&gt;</a></div>
                                @endif
                                <div class="col-md-4"></div>
                                @if ($account->ban_status === 1)
                                    <div class="col-md-4"><a class="btn btn-success text-white"
                                            onclick="window.location='{{ route('adminUpdateBan') }}?id={{ $account->id }}'"
                                            style="">UnBan&gt;</a></div>
                                @else
                                    <div class="col-md-4"><a class="btn btn-danger text-white"
                                            onclick="window.location='{{ route('adminUpdateAccount') }}?id={{ $account->id }}'"
                                            style="">Ban&gt;</a></div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                    <!--  endforeach-->
                    <!-- UnBan-->
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
{{-- <body>
  <div class="py-12">
    <form action="" method="get">
      <label for="search">Search:</label>
      <input type="text" id="search" name="id">
      <button type="submit">Search</button>
    </form>
    @foreach ($accounts as $account)
      <div class="container">
        <div class="row">
          <div class="col-sm">
            Account Name : {{$account->Account_Name}}
          </div>
          <div class="col-sm">
            Account Firstname : {{$account->Account_Firstname}}
          </div>
          <div class="col-sm">
            Account Surname : {{$account->Account_Surname}}
          </div>
          <div class="col-sm">
            Account Birthday : {{$account->Account_Birthday}}
          </div>
          <div class="col-sm">
            Account Username : {{$account->Account_Username}}
          </div>
          <div class="col-sm">
            Account Password : {{$account->Account_Password}}
          </div>
        </div>
      </div>
      <button style="background-color: red; color: white;" onclick="window.location='{{route('adminUpdateAccount')}}?id={{$account->ID}}'">Ban</button>
    @endforeach
</div>
</body> --}}

</html>
@endsection
