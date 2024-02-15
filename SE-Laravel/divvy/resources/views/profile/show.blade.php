@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>



    <div class="py-5">
    <div class="container w-100 text-center">
      <div class="row">
        <div class="col-3">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item" > <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone">Profile</a> </li>
            <li class="nav-item" > <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree">History</a> </li>
          </ul>
        </div>
        <div class="col-9">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="tabone" role="tabpanel">
              <img class="img-fluid d-block rounded-circle mx-auto" src="https://static.pingendo.com/img-placeholder-3.svg" width="100
200">
              <div class="row mt-4">
                <div class="col-md-6">
                  <p class="lead text-right">User Name :</p>
                </div>
                <div class="col-md-6">
                  <p class="lead text-left">{{ Auth::user()->id }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p class="lead text-right">Account Name :</p>
                </div>
                <div class="col-md-6">
                  <p class="lead text-left">{{ Auth::user()->name }}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p class="lead text-right">Amount :</p>
                </div>
                <div class="col-md-6">
                  <p class="lead text-left">{{ Auth::user()->amount_user }}</p>
                </div>
              </div>
              
              <a class="btn btn-primary mt-4" href="{{ route('intTop') }}">เติมเงิน</a>
              <a class="btn btn-primary mt-4" href="{{ route('WithUser') }}">ถอนเงิน</a>
              <a class="btn btn-primary mt-4" href="{{ route('hisU') }}">ประวัติการเติม</a>
            </div>
            </div>
            </div>
            <div class="tab-pane fade" id="tabtwo" role="tabpanel">

            </div>
            <br>
            <br>
            <div class="tab-pane fade" id="tabthree" role="tabpanel" style="">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                  <table class="table table-bordered">
                  <tr>
                  <th>ID No.</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Campaign Name</th>
                  <th>Amount</th>
                  <th width="200px">Action</th>
                  </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    


</html>

@endsection
