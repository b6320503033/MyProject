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
                    
            .table td:first-child {
                width: 200px; /* adjust the width as per your requirement */
            }

        </style>
</head>

<body>


    <div class="card">
    <div class="table-responsive">
                <table class="table" text-align="center">
                  <thead>
                    <tr>
                      <th>Column Name</th>
                      <th>Detail</th>
                    
                    </tr>
                  </thead>

                  <tbody> 
                   
                  
                    <tr>
                      <td>รหัส</td>
                      <td>{{$campaign->id}}</td>
                    </tr>
                    <tr>
                      <td>ชื่อ</td>
                      <td>{{$campaign->campaign_name}}</td>
                    </tr>
                    <tr>
                      <td>รายละเอียด</td>
                      <td>{{$campaign->campaign_Details}}</td>
                    </tr>
                    <tr>
                      <td>เบอร์โทรผู้ตั้งแคมเปญ</td>
                      <td>{{$campaign->campaign_Tel}}</td>
                    </tr>
                    <tr>
                      <td>เลขที่บัญชีผู้รับ</td>
                      <td>{{$campaign->bank_ID}}</td>
                    </tr>
                    <tr>
                      <td>ธนาคารผู้รับ</td>
                      <td>{{$campaign->bank_type}}</td>
                    </tr>
                    <tr>
                      <td>ระยะเวลา</td>
                      <td>{{$campaign->Campaign_Duration}}</td>
                    </tr>
                    <tr>
                      <td>หมวดหมู่</td>
                      <td>{{$campaign->Campaign_Category}}</td>
                    </tr>
                    <tr>
                      <td>ยอดเงินในแคมเปญปัจจุบัน</td>
                      <td>{{$campaign->current_money}}</td>
                    </tr>
                    <tr>
                      <td>เป้าหมาย</td>
                      <td>{{$campaign->goals}}</td>
                    </tr>
                    <tr>
                      <td>ประเภท</td>
                      <td>{{$campaign->campaign_type}}</td>
                    </tr>
                    <tr>
                      <td>ชื่อหน่วยงาน</td>
                      <td>{{$campaign->ins_name}}</td>
                    </tr>
                   
                    <tr>
                      <td>เบอร์โทรหน่วยงาน</td>
                      <td>{{$campaign->id}}</td>
                    </tr>
                    <tr>
                      <td>สถานะ</td>
                      <td>{{$campaign->ins_Tel}}</td>
                    </tr>
                    <tr>
                      <td>วันที่สร้าง</td>
                      <td>{{$campaign->created_at}}</td>
                    </tr>

                    <tr>
                      <td>วันที่อัปเดตล่าสุด</td>
                      <td>{{$campaign->updated_at}}</td>
                    </tr>


                   
                    
            
                    
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
