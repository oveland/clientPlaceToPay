@extends('layout.main')

@section('title', 'Place To Pay')

@section('body')
    <div class="content full-height">
        <div class="title m-b-md">
            Client Place To Pay
        </div>
        <div class="form-horizontal title">
            <a href="{{ route('payment')  }}" class="btn btn-success btn-lg">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                Make a test Payment
            </a>
        </div>
        <div class="card-block" style="font-size: 120%">
            <a href="{{ route('transactions')  }}" class="card-link">
                View all transactions
            </a>
        </div>
    </div>
@endsection