<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar18">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar18"> <a class="navbar-brand d-none d-md-block" href="#">
          <i class="fa d-inline fa-lg fa-circle"></i>
          <b> Divvy</b>
        </a>
        <ul class="navbar-nav mx-auto"></ul>
        <ul class="navbar-nav">
          <li class="nav-item"> <a class="nav-link" href="#">Profile</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" style="">
                <li class="nav-item w-50">
                  <a class="nav-link active" data-toggle="tab" data-target="#tabone">Individual</a>
                </li>
                <li class="nav-item w-50">
                  <a class="nav-link" href="" data-toggle="tab" data-target="#tabtwo" >Organization</a>
                </li>
              </ul>
            </div>
            
           <!--การบริจาคส่วนบุคคล--> 
            
            <div class="card-body">
              <div class="tab-content mt-2">
                <div class="tab-pane fade show active" id="tabone" role="tabpanel">
                  <p class="">การบริจาคส่วนบุคคล</p>
                  
              <!--การบริจาคส่วนบุคคล อัปโหลดรูป-->
                  <div>
                    <div class="mb-4 d-flex justify-content-center">
                         <img src="https://static.pingendo.com/img-placeholder-1.svg" alt="example placeholder" style="width: 300px;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                            <input type="file" class="form-control d-none" id="customFile1" />
                        </div>
                    </div>
                </div>
                  
                  <!--การบริจาคส่วนบุคคล การเลือกหมวดหมู่-->
                  <div class="btn-group py-3">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">หมวดหมู่</button>
                    <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  
                  <!--การบริจาคส่วนบุคคล ฟอร์ม-->
                  <!--ชื่อ-->
                  <form id="c_form-h" class="">
                  <div class="form-group row"> <label for="name" class="col-2 col-form-label">Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" id="name" placeholder="example"> </div>
                    </div>
                    
                    <!--รายละเอียด-->
                    <div class="form-group row"> <label for="detail" class="col-2 col-form-label">Detail</label>
                      <div class="col-10">
                        <input type="text" class="form-control" id="detail" placeholder="example"> </div>
                    </div>
                    
                    <!--เบอร์-->
                    <div class="form-group row"> <label for="tel" class="col-2 col-form-label">Tel.</label>
                      <div class="col-10">
                        <input type="number" class="form-control" id="tel" placeholder="example"> </div>
                    </div>
                    
                    <!--ธนาคาร droplist-->
                    <div class="form-group row"> <label for="bank" class="col-2 col-form-label">Bank</label>
                      <div class="col-10">
                        <div class="btn-group w-100">
                          <button class="btn dropdown-toggle px-5 btn-light" data-toggle="dropdown">ธนาคาร</button>
                          <div class="dropdown-menu w-100"> <a class="dropdown-item" href="#">Action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!--หมายเลขบัญชี-->
                    <div class="form-group row"> <label for="bid" class="col-2 col-form-label">Bank Account ID</label>
                      <div class="col-10">
                        <input type="email" class="form-control" id="bid" placeholder="example"> </div>
                    </div>
                    
                    <!--การเลือกจบ-->
                    <div class="form-group row"> <label  class="col-2 col-form-label">End With</label>
                    <div class="col-10">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="nav-item" >
                            <a href="#date" aria-controls="date" role="tab" id="dateBtn" data-toggle="tab" class="active nav-link" data-target="#date">Date</a>
                            </li>
                            <li role="presentation" class="nav-item">                         
                            <a href="#amount" aria-controls="amount" role="tab" id="amoubtBtn" data-toggle="tab" class="nav-link" data-target="#tabpane2">Amount</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--จบแบบเลือกวัน-->
                            <div role="tabpanel" class="tab-pane active" id="date">
                            <div class="form-group row"> <label class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="inputmailh" placeholder="example" > </div>
                                </div>
                            </div>
                            <!--จบแบบเลือกจำนวนเงิน-->
                            <div role="tabpanel" class="tab-pane" id="tabpane2">
                            <div class="form-group row"> <label  class="col-2 col-form-label" contenteditable="true">Amount</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" step='0.01' id="inputmailh" placeholder="example"> </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>



                <!--การบริจาคส่วนตัว ปุ่มsubmit--> 
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                
                
                 <!--การบริจาคในนามองค์กร--> 
                </div>
                <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                  <p class="">การบริจาคในนามองค์กร</p>

                   <!--การบริจาคในนามองค์กร การอัปโหลดภาพ-->
                  <div>
                    <div class="mb-4 d-flex justify-content-center">
                         <img src="https://static.pingendo.com/img-placeholder-1.svg" alt="example placeholder" style="width: 300px;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                            <input type="file" class="form-control d-none" id="customFile1" />
                        </div>
                    </div>
                </div>
                  


                <!--การบริจาคในนามองค์กร การเลือกหมวดหมู่-->
                  <div class="btn-group py-3">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">หมวดหมู่</button>
                    <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  
                  <!--การบริจาคในนามองค์กร ฟอร์ม-->
                  <!--ชื่อ-->
                  <form id="c_form-h" class="">
                    <div class="form-group row"> <label for="name" class="col-2 col-form-label">Name</label>
                      <div class="col-10">
                        <input type="text" class="form-control" id="name" placeholder="example"> </div>
                    </div>
                    
                    <!--รายละเอียด-->
                    <div class="form-group row"> <label for="detail" class="col-2 col-form-label">Detail</label>
                      <div class="col-10">
                        <input type="text" class="form-control" id="detail" placeholder="example"> </div>
                    </div>
                    
                     <!--เบอร์-->
                    <div class="form-group row"> <label for="tel" class="col-2 col-form-label">Tel.</label>
                      <div class="col-10">
                        <input type="number" class="form-control" id="tel" placeholder="example"> </div>
                    </div>
                    
                    <!--ธนาคาร droplist-->
                    <div class="form-group row"> <label for="bank" class="col-2 col-form-label">Bank</label>
                      <div class="col-10">
                        <div class="btn-group w-100">
                          <button class="btn dropdown-toggle px-5 btn-light" data-toggle="dropdown">ธนาคาร</button>
                          <div class="dropdown-menu w-100"> <a class="dropdown-item" href="#">Action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!--หมายเลขบัญชี-->
                    <div class="form-group row"> <label for="bid" class="col-2 col-form-label">Bank Account ID</label>
                      <div class="col-10">
                        <input type="email" class="form-control" id="bid" placeholder="example"> </div>
                    </div>
                    
                    
                    <!--การอัปโหลดไฟล์ยืนยันตัวตน-->
                    <div class="form-group row">
                        <label for="customFile" class="col-2 col-form-label">File</label>
                        <div class="col-10">
                            <input type="file" class="form-control" id="customFile" />
                        </div>
                    </div>
                    
                    <!--การเลือกจบ-->
                    <div class="form-group row"> <label  class="col-2 col-form-label">End With</label>
                    <div class="col-10">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="nav-item" >
                            <a href="#date" aria-controls="date" role="tab" id="dateBtn" data-toggle="tab" class="active nav-link" data-target="#date">Date</a>
                            </li>
                            <li role="presentation" class="nav-item">                         
                            <a href="#amount" aria-controls="amount" role="tab" id="amoubtBtn" data-toggle="tab" class="nav-link" data-target="#tabpane2">Amount</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                        <!--จบแบบเลือกวัน-->
                            <div role="tabpanel" class="tab-pane active" id="date">
                            <div class="form-group row"> <label class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" id="inputmailh" placeholder="example" > </div>
                                </div>
                            </div>
                            
                            <!--จบแบบเลือกจำนวนเงิน-->
                            <div role="tabpanel" class="tab-pane" id="tabpane2">
                            <div class="form-group row"> <label  class="col-2 col-form-label" contenteditable="true">Amount</label>
                                <div class="col-10">
                                    <input type="number" class="form-control" step='0.01' id="inputmailh" placeholder="example"> </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                    
                    <!--การบริจาคในนามองค์กร ปุ่มsubmit--> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
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
</body>

</html>
