<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้า Campaign</title>
</head>
<body>
    <div class="py-12">
      @foreach ($campaign as $campaigns)
        <div class="container">
            <div class="row">
              <div class="col-sm">
                Campaign Name : {{$campaigns->Campaign_Name}}
              </div>
              <div class="col-sm">
                Campaign Details : {{$campaigns->Campaign_Details}}
              </div>
              <div class="col-sm">
                Campaign Tel : {{$campaigns->Campaign_Tel}}
              </div>
              <div class="col-sm">
                Campaign Bank ID : {{$campaigns->Campaign_Bank_ID}}
              </div>
              <div class="col-sm">
                Campaign Bank Type : {{$campaigns->Campaign_Bank_Type}}
              </div>
              <div class="col-sm">
                Campaign Category : {{$campaigns->Campaign_Category}}
              </div>
              <div class="col-sm">
                Campaign Type : {{$campaigns->Campaign_Type}}
              </div>
            </div>
        </div>           
      @endforeach
    </div>
</body>
</html>