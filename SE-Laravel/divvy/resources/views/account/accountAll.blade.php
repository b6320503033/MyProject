<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้า Account</title>
</head>
<body>
  <div class="py-12">
    @foreach ($accounts as $account)
      <div class="container">
        <div class="row">
          <div class="col-sm">
            Account Name : {{$account->Account_Name}}
          </div>
          <div class="col-sm">
            Account Firstname : {{$account->Account_Firstname}}
          </div>
          <div class="col-sm">
            Account Surname : {{$account->Account_Surname}}
          </div>
          <div class="col-sm">
            Account Birthday : {{$account->Account_Birthday}}
          </div>
          <div class="col-sm">
            Account Username : {{$account->Account_Username}}
          </div>
          <div class="col-sm">
            Account Password : {{$account->Account_Password}}
          </div>
        </div>
      </div>
    @endforeach         
</div>
</body>
</html>
