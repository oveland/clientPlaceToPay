@if( count( $transactions ) <= 0 )
    <div class="alert alert-info col-md-8 col-md-offset-2">
        <strong>List empty!</strong> There are no transactions for this session
    </div>
@else
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td><b>Code</b></td>
                    <td><b>Transaction ID</b></td>
                    <td><b>Response Code</b></td>
                    <td><b>Acción</b></td>
                </tr>
            </thead>
            <tbody>
            @foreach( $transactions as $reference => $transaction )
                <tr>
                    <td>{{ $transaction->getReturnCode() }}</td>
                    <td>{{ $transaction->getTransactionID() }}</td>
                    <td>{{ $transaction->getResponseCode() }}</td>
                    <td>
                        <a href="{{ route('transaction', $reference)  }}">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                            View Status
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif