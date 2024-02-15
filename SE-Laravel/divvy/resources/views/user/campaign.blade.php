@extends('layouts.app')

@section('content')
<?php use Illuminate\Support\Facades\Auth; ?>


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
   <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>-->

    <div class="py-5" >
    <div class="container">
    @if ($errors->has('donation_amount'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->get('donation_amount') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('success'))
          <div class="alert alert-success">{{ Session::get('success') }}</div>
      @elseif(Session::has('danger'))
          <div class="alert alert-danger">{{ Session::get('danger') }}</div>
      @elseif(Session::has('warn'))
          <div class="alert alert-warning">{{ Session::get('warn') }}</div>
      @endif 
      <div class="row">
      @if($campaign)
        <div class="col-md-4"><img class="img-fluid d-block mx-auto" src="{{asset($campaign->campaign_Image)}}" width="300"></div>
      @endif
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <h1 class="" style="overflow: hidden; text-overflow: ellipsis; word-wrap: break-word;">{{$campaign->campaign_name}}</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="lead mt-4"style="overflow: hidden; text-overflow: ellipsis; word-wrap: break-word;">{{$campaign->campaign_Detail}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <div class="row pt-4">
            <div class="col-md-6">
              <h4 class="text-right">ผู้รับบริจาค :</h4>
            </div>
            @if($campaign->campaign_type=="Individual")
            <div class="col-md-6">
              <h4 class="text-left">{{$campaign->name}}</h4>
            </div>
            @elseif($campaign->campaign_type=="Organization")
            <div class="col-md-6">
              <h4 class="text-left">{{$campaign->ins_name}}</h4>
            </div>
            @endif
            
            
            <div class="col-md-6">
              <h4 class="text-right">เบอร์โทร :</h4>
            </div>
            
            @if($campaign->campaign_type=="Individual")
            <div class="col-md-6">
              <h4 class="text-left">{{$campaign->campaign_Tel}}</h4>
            </div>
            @elseif($campaign->campaign_type=="Organization")
            <div class="col-md-6">
              <h4 class="text-left">{{$campaign->ins_Tel}}</h4>
            </div>
            @endif
            </div>
          <div class="row pt-4">
            <div class="col-md-6">
              <h4 class="text-right">ธนาคาร  {{$campaign->bank_type}} :</h4>
            </div>
            <div class="col-md-6">
              <h4 class="text-left">{{$campaign->bank_ID}}</h4>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col-md-6">
              <h4 class="text-right">ยอดบริจาค :</h4>
            </div>
            <div class="col-md-6">
              <h4 class="text-left">{{$campaign->current_money}} / {{$campaign->goals}}</h4>
            </div>
          </div>

          <div class="row pt-4">
            <div class="col-md-2 pt-2"></div>

            <div class="col-md-8">
              <form class="text-center" action="{{route('userDonate' )}}" method="post">
                @csrf
                <div class="form-group text-center shadow-none"> 
                <input type="hidden" name="Campaign_ID" value="{{ $campaign->id }}">
                  <input type="number" step="0.01" class="form-control form-control-lg text-center w-100" placeholder="กรุณาใส่จำนวนเงิน" name="donation_amount"> 
                  
                  
                
                </div>
                
                <input type="submit" value="Donate" class="btn btn-primary btn-lg">
               
              
              </form>
            </div>

            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
      

   

</body>
</html>
   

</body>
</html>


@endsection
