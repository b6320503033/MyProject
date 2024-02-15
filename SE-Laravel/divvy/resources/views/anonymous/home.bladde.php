<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
        <title>Home</title>
        <style>
            .container {
                max-width: none;
                width: 1200px;
            }
           /* .container-wrapper {
                display: flex;
                justify-content: center;
             }*/
           .row1{
                width: 1200px;
                display: flex;
                justify-content: center;
           }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar18">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar18"> <a class="navbar-brand d-none d-md-block" href="{{route('home')}}">
          <i class="fa d-inline fa-lg fa-circle"></i>
          <b> Divvy</b>
        </a>
        <ul class="navbar-nav mx-auto"></ul>
        <ul class="navbar-nav">
          <!-- login -->
          <li class="nav-item"> <a class="nav-link" href="#">Log in</a> </li>
          <!-- Register -->
          <li class="nav-item"> <a class="nav-link text-white" href="#">Register</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ตัวช่วยการค้นหา-->
  <div class="border-top-0 m-0 py-2 pl-5 w-100" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-1 text-right" style="">
          <h4 class="">Filter</h4>
        </div>
        <div class="col-md-3" style="">
          <form class="form-inline">
            <div class="input-group">
              <!-- ตัวช่วยการค้นหา กรอก-->
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
              <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>
            </div>
          </form>
        </div>
        <div class="col-md-3" style="">
          <div class="btn-group">
            <!-- ตัวช่วยการค้นหา หมวดหมู่-->
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Catagory</button>
            <div class="dropdown-menu"> <a class="dropdown-item" href="#">Action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div>
        </div>
        <div class="col-md-3" style=""></div>
      </div>
    </div>
  </div>
  <div class="mx-1">
    <div class="container" style="">
    <!-- row-->
    
      <div class="row1 w-100">
        <!-- campaign-->
       <!--  foreach-->
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2 w-100">หัวข้อ</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">123456</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#" style="">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
        <!--  endforeach-->
        <!-- campaign-->
     <!--   <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
      <div class="row1 w-100">
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
        <div class="border rounded m-1 py-1 shadow border-light col-md-3"><img class="img-fluid d-block w-75 mx-auto" src="https://static.pingendo.com/img-placeholder-1.svg" style="">
          <h5 class="text-center mt-2">Heading 5</h5>
          <p class="">Paragraph. Then, my friend, when darkness overspreads my eyes, and heaven and earth seem to dwell in my soul and absorb its power, like the form of a beloved mistress, then I often think with longing.</p>
          <h5 class="text-right">Heading 5</h5>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><a class="btn btn-primary" href="#">detail&gt;</a></div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
    
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo>
    -->
      </div>
    </div>
  </div>
  </body>
</html>
