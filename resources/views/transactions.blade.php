@extends('layout.main')

@section('title', 'PTP - Payment')

@section('body')
    <div class="m-b-md">
        <h1><i class="fa fa-list-alt" aria-hidden="true"></i> Transaction request list</h1>
    </div>

    <hr class="col-md-12" style="padding: 0">
    <div class="content col-md-12">
        <div class="form-horizontal col-md-10 col-md-offset-1">
            @include('templates.list')
        </div>

        <div class="form-horizontal title">
            <a href="{{ route('payment')  }}" class="btn btn-success btn-lg">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                Make a new test Payment
            </a>
        </div>
    </div>
@endsection