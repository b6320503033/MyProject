@extends('layouts.app')

@section('content')
<body>
    <div class="column  mt-5 align-items-center text-center">
        <div class="colunm text-center">
            <a href="{{ route('formT') }}" class="btn btn-success ">คำร้องเติมเงิน</a>
            <a href="{{ route('formW') }}" class="btn btn-success">คำร้องถอนเงิน</a>
            <a href="{{ route('formC') }}" class="btn btn-success">คำร้องแคมเปญ</a>
          </div>

    </div>
</body>
</html>
@endsection