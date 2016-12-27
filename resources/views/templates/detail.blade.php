<div class="card col-md-6 col-md-offset-3">
    <h3>Transaction {{ $transactionStatus->getReference() }}</h3>
    <div class="card-block">
        <h4 class="card-title">Request status: {{ $transactionStatus->getReturnCode() }}</h4>
        <h2 class="card-text {{ $transactionStatus->getResponseReasonText() == 'Aprobada'?'text-success':'text-danger' }}">
            {{ $transactionStatus->getResponseReasonText()  }}
        </h2>
    </div>
    <ul class="list-group list-group-flush text-info">
        <li class="list-group-item">
            <b>{{ $transactionStatus->getTransactionState() }}</b>
        </li>
    </ul>
    <div class="card-block" style="font-size: 120%">
        <a href="{{ route('payment')  }}" class="card-link">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            Make a new test Payment
        </a>
        |
        <a href="{{ route('transactions')  }}" class="card-link">
            View all transactions
        </a>
    </div>
</div>