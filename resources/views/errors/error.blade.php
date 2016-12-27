@extends('layout.main')

@section('title', 'Place To Pay')

@section('body')
    <div class="content full-height">
        <div class="title m-b-md text-danger">
            Transaction error
        </div>

        <div class="alert alert-danger col-md-8 col-md-offset-2">
            <strong>Error!</strong> {{ $error }}
        </div>

        <hr>

        <div class="form-horizontal title">
            <a href="{{ route('payment')  }}" class="btn btn-success btn-lg">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                Make a new test Payment
            </a>
        </div>
    </div>
@endsection