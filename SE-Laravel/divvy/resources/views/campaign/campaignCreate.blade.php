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
        <div class="border-top-0 m-0 py-2 pl-5 w-100" style="">
            {{-- <div class="container">
                 <div class="row">
                    <div class="col-md-3" style="">
                        <x href="javascript:;" onclick="window.location='{{ route('campaignAll') }}'">
                            <svg class="icon-arrow before">
                                <use xlink:href="#arrow"></use>
                            </svg>
                            <span class="label">Back</span>
                            <svg class="icon-arrow after">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </x>
                        <svg style="display: none;">
                            <defs>
                                <symbol id="arrow" viewBox="0 0 35 15">
                                    <title>Arrow</title>
                                    <path
                                        d="M27.172 5L25 2.828 27.828 0 34.9 7.071l-7.07 7.071L25 11.314 27.314 9H0V5h27.172z " />
                                </symbol>
                            </defs>
                        </svg>
                    </div>
                    <div class="col-md-1" style="">
                    </div>
                     <div class="col-md-3 d-flex justify-content-center" style="">
                        <h4 class="">สร้างแคมเปญ</h4>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-3" style=""></div> --}}

            <div class="containerCampaign">
                <div class="box" onclick="window.location='{{ route('campaignCreateIndividual') }}'">
                    <img
                        src="https://static.vecteezy.com/system/resources/previews/008/453/793/original/man-working-with-laptop-flat-design-illustration-suitable-for-poster-presentation-and-social-media-needs-free-vector.jpg">
                    <span>Individual</span>
                </div>
                <div class="box" onclick="window.location='{{ route('campaignCreateOrganization') }}'">
                    <img
                        src="https://community.thriveglobal.com/wp-content/uploads/2020/12/Organization-In-Leadership.png">
                    <span>Organization</span>
                </div>
            </div>
            {{-- <div class="container d-flex justify-content-between">
            <div class="form-group row">
                <div class="col-md-4"><a class="btn btn-primary text-white"
                        onclick="window.location='{{ route('campaignCreateIndividual') }}'"
                        style="">Individual&gt;</a></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><a class="btn btn-primary text-white"
                        onclick="window.location='{{ route('campaignCreateOrganization') }}'"
                        style="">Organization&gt;</a></div>
            </div>
        </div> --}}
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

<style>
    html,
    body {
        display: grid;
        height: 100%;
    }

    x {
        border: 4px solid #42CDC0;
        color: #FFFFFF;
        background-color: #42CDC0;
        display: inline-block;
        font-size: 18px;
        font-weight: bold;
        line-height: 24px;
        margin: auto;
        padding: 12px 32px 12px 82px;
        position: relative;
        text-decoration: none;
        cursor: pointer;
    }

    x .label,
    x .icon-arrow {
        backface-visibility: hidden;
        transform: translateZ(0);
        perspective: 1000;
    }

    x .label {
        display: inline-block;
        transition: transform .5s cubic-bezier(0.86, 0, 0.07, 1);
    }

    x .icon-arrow {
        fill: #FFFFFF;
        height: 15px;
        top: 17px;
        transition: transform .5s cubic-bezier(0.86, 0, 0.07, 1), opacity .4s cubic-bezier(0.86, 0, 0.07, 1);
        width: 35px;
    }

    x .icon-arrow.before {
        left: 32px;
        margin-right: 15px;
        position: absolute;
        transform-origin: left center;
    }

    x .icon-arrow.after {
        margin-left: 15px;
        opacity: 0;
        position: absolute;
        right: 32px;
        transform: translateX(75%) scaleX(0.1);
        transform-origin: right center;
    }

    x:hover .label {
        transform: translateX(-52px);
    }

    x:hover .icon-arrow.before {
        opacity: 0;
        transform: translateX(-75%) scaleX(0.1);
    }

    x:hover .icon-arrow.after {
        opacity: 1;
        transform: translateX(0) scaleX(1);
    }

    x:active {
        border-color: #FFFFFF;
        color: #FFFFFF;
    }

    x:active .icon-arrow {
        fill: #FFFFFF;
    }

    .containerCampaign {
        display: flex;
        width: 100%;
        padding: 4% 2%;
        box-sizing: border-box;
        height: 100vh;
    }

    .box {
        flex: 1;
        overflow: hidden;
        transition: .5s;
        margin: 0 2%;
        box-shadow: 0 20px 30px rgba(0, 0, 0, .1);
        line-height: 0;
    }

    .box>img {
        width: 200%;
        height: calc(100% - 10vh);
        object-fit: cover;
        transition: .5s;
    }

    .box>span {
        font-size: 3.8vh;
        display: block;
        text-align: center;
        height: 10vh;
        line-height: 2.6;
    }

    .box:hover {
        flex: 1 1 50%;
        cursor: pointer;
    }

    .box:hover>img {
        width: 100%;
        height: 100%;
    }
</style>
