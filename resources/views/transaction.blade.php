@extends('layout.main')

@section('title', 'PTP - Payment')

@section('body')
    <div class="m-b-md">
        <h1><i class="fa fa-handshake-o" aria-hidden="true"></i> Transaction Status</h1>
    </div>

    <hr class="col-md-12" style="padding: 0">
    <div class="content col-md-12">
        <div class="form-horizontal col-md-10 col-md-offset-1">
            @include('templates.detail')
        </div>
    </div>
@endsection