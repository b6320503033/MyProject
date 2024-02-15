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


    <div class="card">
    <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID Campaign No.</th>
                      <th>Campaign Name</th>
                      <th>ประเภท</th>
                      <th>ชื่อผู้รับ</th>
                      <th>หมายเลขบัญชีธนาคารผู้รับ</th>
                      <th>เบอร์โทรศัพท์ผู้รับ</th>
                      <th>Current Amount</th>
                      <th>สถานะ</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody> 
                   
                  @foreach ($mycampaigns as $campaign)
                    <tr>
                      <td>{{$campaign->id}}</td>
                      <td>{{$campaign->campaign_name}}</td>
                      <td>{{$campaign->campaign_type}}</td>
                      
                      
                      @if($campaign->campaign_type=="personal")<td>{{Auth::user()->name}}</td>
                      @elseif($campaign->campaign_type=="agency")<td>{{$campaign->ins_name}}</td>                     
                      @endif

                      <td>{{$campaign->bank_ID}}</td>
                      
                      @if($campaign->campaign_type=="personal")<td>{{$campaign->campaign_Tel}}</td>
                      @elseif($campaign->campaign_type=="agency")<td>{{$campaign->ins_Tel}}</td>                     
                      @endif
                      
                      
                      
                      <td>{{$campaign->current_money}}</td>
                      
                      @if($campaign->status=="open")<td>open : กำลังเปิดรับบริจาค</td>
                      @elseif($campaign->status=="close")<td>close : ปิดรับบริจาค รอรับเงิน</td>
                      @elseif($campaign->status=="cancel")<td>cancel : ยกเลิกการรับบริจาค รอคืนเงิน</td>
                      @elseif($campaign->status=="end")<td>end : ได้รับเงินบริจาตแล้ว</td>
                      @endif

                      
                      <td><a  class="btn btn-secondary btn-lg" href="{{ route('detail', ['id' => $campaign->id]) }}" >Detail</a></td>

                     @if($campaign->status!="open")
                      <td><button  class="btn btn-info btn-lg" onclick="alert('ขณะนี้แคมเปญของท่านไม่ได้เปิดอยู่กรุณาตรวจสอบอีกครั้ง')">Cancel</button></td>
                      <td><button  class="btn btn-info btn-lg" onclick="alert('ขณะนี้แคมเปญของท่านไม่ได้เปิดอยู่กรุณาตรวจสอบอีกครั้ง')">Close</button></td>
                    @else
                      <form class="text-center" action="{{route('cancelCampaign')}}" method="post">
                      @csrf
                        <input type="hidden" name="Campaign_ID" value="{{ $campaign->id }}">
                        <td><button  class="btn btn-danger btn-lg"  onclick="alert('ทำการยกเลิกแคมเปญเรียบร้อย')">Cancel</button></td>
                      </form>
                      <form class="text-center" action="{{route('closeCampaign')}}" method="post">
                      @csrf
                        <input type="hidden" name="Campaign_ID" value="{{ $campaign->id }}">
                        <td><button  class="btn btn-warning btn-lg" onclick="alert('ทำการปิดแคมเปญเรียบร้อย') ">Close</button></td>
                      </form>
                    @endif
                    </tr>
                    
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
    </div>

  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
      

   

        </body>
</html>

@endsection