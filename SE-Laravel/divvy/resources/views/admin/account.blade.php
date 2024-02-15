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

  <div class="py-5">
    <div class="container w-100 text-center">
      <div class="row">
        <div class="col-9">
          <div class="container">


            @foreach ($account as $acc)
            <img class="img-fluid d-block rounded-circle mx-auto" src="{{asset($acc->image)}}" width="100 200">
              <div class="row mt-4">
                <div class="col-md-6">
                  <p class="lead text-right">ชื่อ :</p>
                </div>
                <div class="col-md-6">
                  <p class="lead text-left">{{$acc->firstname}}  {{$acc->lasName}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p class="lead text-right">ชื่อ Account :</p>
                </div>
                <div class="col-md-6">
                  <p class="lead text-left">{{$acc->name}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p class="lead text-right">จำนวนเงิน :</p>
                </div>
                <div class="col-md-6">
                  <p class="lead text-left">{{$acc->amount_user}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p class="lead text-right">เหตุผลที่ถูกรีพอร์ต :</p>
                </div>
                <div class="col-md-6">
                  {{-- <p class="lead text-left">{{$acc->Report_Reason}}</p> --}}
                </div>
              </div>
              <div class="row">
                @if ($acc->ban_status === 1)
                <div class="col-md-4"><a class="btn btn-primary text-white" onclick="window.location='{{route('adminAccountBan')}}'" style="">Back&gt;</a></div>
                @else
                  <div class="col-md-4"><a class="btn btn-primary text-white" onclick="window.location='{{route('adminAccountAll')}}'" style="">Back&gt;</a></div>
                @endif
                <div class="col-md-4"></div>
                @if ($acc->ban_status === 1)
                  <div class="col-md-4"><a class="btn btn-success text-white" onclick="window.location='{{route('adminUpdateBan')}}?id={{$acc->id}}'" style="">UnBan&gt;</a></div>
                @else
                  <div class="col-md-4"><a class="btn btn-danger text-white" onclick="window.location='{{route('adminUpdateAccount')}}?id={{$acc->id}}'" style="">Ban&gt;</a></div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo>
</body>

</html>
@endsection
