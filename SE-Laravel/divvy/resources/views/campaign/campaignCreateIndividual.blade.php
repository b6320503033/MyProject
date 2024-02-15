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
        <div class="container d-flex justify-content-center">
            <form action="{{ route('campaignSaveIndividual') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-10">
                        <img class="img-fluid d-block mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg"
                            width="300">
                    </div>
                    <div class="col-sm-10">
                        <label class="mr-sm-2" for="Campaign">รูปโปรไฟล์:</label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="A" name="Campaign_Image"
                            onchange="displayFileName()"required>
                        <label class="custom-file-label" for="Campaign_Image">Choose file</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label class="mr-sm-2" for="Campaign">ชื่อแคมเปญ:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Campaign_Name" name="Campaign_Name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label class="mr-sm-2" for="Campaign">รายละเอียดแคมเปญ:</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea id="Campaign_Details" class="form-control" name="Campaign_Details" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label class="mr-sm-2" for="Campaign">เบอร์โทรศัพท์:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Campaign_Tel" name="Campaign_Tel" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="col-sm-10">
                            <label class="mr-sm-2" for="Campaign">เลขที่บัญชี:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Campaign_Bank_ID" name="Campaign_Bank_ID"
                                required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-sm-10">
                            <label class="mr-sm-2" for="Campaign">ธนาคาร:</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Campaign_Bank_Type" name="Campaign_Bank_Type"
                                required>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label class="mr-sm-2" for="Campaign">เป้าหมายเงินโดเนท:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="int" class="form-control" id="Campaign_Donation_Goals"
                            name="Campaign_Donation_Goals" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label class="mr-sm-2" for="Campaign">ประเภทแคมเปญ:</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2" id="Campaign_Category" name="Campaign_Category"
                            required>
                            <option value="">เลือกประเภท</option>
                            <option value="Education">Education</option>
                            <option value="Health">Health</option>
                            <option value="Environment">Environment</option>
                            <option value="Disaster Relief">Disaster Relief</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="container d-flex justify-content-between">
                        <div class="col-md-4"><a class="btn btn-primary text-white"
                                onclick="window.location='{{ route('campaignCreate') }}'" style="">Back&gt;</a>
                        </div>
                        <input class="btn btn-primary mb-2" type="submit" value="Submit">
                    </div>
                </div>
        </div>
        </form>

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

<script>
    function displayFileName() {
        const inputFile = document.getElementById("A");
        const fileName = inputFile.files[0].name;
        const label = document.querySelector(".custom-file-label");
        label.innerHTML = fileName;
    }
</script>
