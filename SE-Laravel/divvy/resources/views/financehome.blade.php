@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    นี้คือหน้าของ การเงิน
                    <div class="column  mt-5 align-items-center text-center">
        <div class="colunm text-center">
            <a href="{{ route('formT') }}" class="btn btn-success ">คำร้องเติมเงิน</a>
            <a href="{{ route('formW') }}" class="btn btn-success">คำร้องถอนเงิน</a>
            <a href="{{ route('formC') }}" class="btn btn-success">คำร้องแคมเปญ</a>
          </div>

    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

