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
        <div class="container">
            @foreach ($campaigns as $cam)
                <div class="row">
                    <div class="col-md-4"><img class="img-fluid d-block mx-auto" src="{{ asset($cam->campaign_Image) }}"
                            width="300"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="">{{ $cam->campaign_name }}</h1>
                                <h5 class="">สถานะ : {{ $cam->status }}</h5>
                                <h5 class="">ประเภทแคมเปญ : {{ $cam->campaign_type }}</h5>
                                <h5 class="">เบอร์โทรศัพท์ : {{ $cam->campaign_Tel }}</h5>
                                <h5 class="">ธนาคาร : {{ $cam->bank_ID }}</h5>
                                <h5 class="">เลขบัญชี : {{ $cam->bank_type }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="lead mt-4">{{ $cam->campaign_Detail }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row pt-4">
                            <div class="col-md-6">
                                <h4 class="text-right">ยอดบริจาค :</h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-left">{{ $cam->current_money ?? 0 }} / {{ $cam->goals }}</h4>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-2 pt-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4"><a class="btn btn-primary text-white"
                                            onclick="window.location='{{ route('adminCampaignAll') }}'"
                                            style="">Back&gt;</a></div>
                                    @if ($cam->status === 'open')
                                        <div class="col-md-4"><a class="btn btn-danger text-white"
                                                onclick="window.location='{{ route('adminCampaignCancel') }}?id={{ $cam->id }}'"
                                                style="">Cancel&gt;</a></div>
                                        <div class="col-md-4"><a class="btn btn-success text-white"
                                                onclick="window.location='{{ route('adminCampaignClose') }}?id={{ $cam->id }}'"
                                                style="">Close&gt;</a></div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
@endsection
