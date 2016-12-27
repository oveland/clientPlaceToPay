@extends('layout.main')

@section('title', 'PTP - Payment')

@section('body')
    <form action="{{ route('pay') }}" class="form-payment" method="post">
        <div class="m-b-md">
            <h1><i class="fa fa-shopping-bag" aria-hidden="true"></i> Payment</h1>
            <h2>
                <i class="fa fa-usd" aria-hidden="true"></i>
                <input type="number" name="bank[totalAmount]" min="0" max="1000000" value="12">
            </h2>
        </div>

        <hr class="col-md-12" style="padding: 0">
        <div class="content col-md-12">
            <div class="form-horizontal col-md-10 col-md-offset-1">
                @include('templates.wizard')
            </div>
        </div>
    </form>

    <script type="application/javascript">
        $(document).ready(function () {
            $('#wizardPayment').wizard();
            $('#wizardPayment').wizard('selectedItem', {
                step: 1
            });

            $('#wizardPayment').on('finished.fu.wizard', function (evt, data) {
                $('.form-payment').submit();
            });
        });

        new Vue({
            el: '.form-payment',
            data: {
                payer: {
                    documentType: 'CC',
                    document: '1061743074',
                    firstName: 'Oscar',
                    lastName: 'Velásquez Andrade',
                    company: 'Oveland',
                    emailAddress: 'oscarivelan@gmail.co',
                    address: 'Cra 10 23 N 55',
                    city: 'New York',
                    province: 'Province of New York',
                    country: 'CO',
                    phone: '8201900',
                    mobile: '3145224313'
                },
                bank: {
                    bankCode: 1022,
                    bankInterface: 0
                }
            }
        })
    </script>
@endsection