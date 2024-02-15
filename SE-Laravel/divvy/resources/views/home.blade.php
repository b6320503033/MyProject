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
   <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>-->

    <!-- ตัวช่วยการค้นหา-->
  <div class="border-top-0 m-0 py-2 pl-5 w-100" >
    <div class="container">
      <div class="row">
        <div class="col-md-1 text-right" >
          <h4 class="">Filter</h4>
        </div>
        <div class="col-md-3" >
          <form class="form-inline" form action="{{ route('search') }}" method="GET">
            <div class="input-group">
              <!-- ตัวช่วยการค้นหา กรอก-->
              <input type="text" class="form-control" id="inlineFormInputGroup" name="key" placeholder="Search">
              <div class="input-group-append"><button class="btn btn-primary" type="button" ><i class="fa fa-search"></i></button></div>
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </div>

  <div class="mx-1">
        <div class="container">
        @php($i=1)
    
        @foreach ($campaign as $ecampaign)
            @if($ecampaign->status=="open")
            @php($j=$i-1)
            @if($i==1||$j%4==0)
                <div class="row1 w-100">
            @endif
            <div class="border rounded m-1 py-1 shadow border-light col-md-3 " style="overflow: hidden;">
                <img class="img-fluid d-block w-75 mx-auto" src="{{asset( $ecampaign->campaign_Image)}}" >
                <h5 class="text-center mt-2 w-100 " style="white-space: normal; overflow: hidden; text-overflow: ellipsis;">{{$ecampaign->campaign_name}}</h5>
                <p class="" style="white-space: normal; overflow: hidden; text-overflow: ellipsis; ">{{$ecampaign->campaign_Detail}}</p>
                
                <h5 class="text-right">{{$ecampaign->current_money}} / {{$ecampaign->goals}}</h5>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><a class="btn btn-primary" href="{{ route('campaign', ['id' => $ecampaign->id]) }}" style="">detail&gt;</a></div>
                    <div class="col-md-4"></div>
                </div>
            </div>
     
            @if($i%4==0)
                </div>
            @endif

            @php($i++)
            @endif

        @endforeach
        </div>
    </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
      

   

        </body>
</html>




@endsection
