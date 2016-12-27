<link href="//www.fuelcdn.com/fuelux/3.13.0/css/fuelux.min.css" rel="stylesheet">

<div class="wizard fuelux" data-initialize="wizard" id="wizardPayment">
    <div class="steps-container">
        <ul class="steps" style="margin-left: 0">
            <li data-step="1" data-name="campaign" class="active">
                <span class="badge badge-info">1</span>Payment Type
                <span class="chevron"></span>
            </li>
            <li data-step="2" class="">
                <span class="badge">2</span>Bank List
                <span class="chevron"></span>
            </li>
            <li data-step="3" data-name="template">
                <span class="badge">3</span>Interface Type
                <span class="chevron"></span>
            </li>
            <li data-step="4" data-name="template">
                <span class="badge">3</span>Data Payment
                <span class="chevron"></span>
            </li>
        </ul>
    </div>

    <div class="actions">
        <button type="button" class="btn btn-warning btn-prev" disabled="disabled">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i> Prev
        </button>
        <button type="button" class="btn btn-success btn-next" data-last="Pay with Place to Pay">
            Next <i class="fa fa-hand-o-right" aria-hidden="true"></i>
        </button>
    </div>

    <div class="step-content">
        {{ csrf_field() }}
        <div class="step-pane sample-pane alert active col-md-12" data-step="1">
            <h4>Chose type payment</h4>
            <div class="form-horizontal col-md-6 col-md-offset-3">
                <div class="form-group">
                    <select class="form-control">
                        <option value="0">Debit Card</option>
                        <option value="1" disabled>Credit Card</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="step-pane sample-pane alert col-md-12" data-step="2">
            <h4>Choose a bank</h4>
            <div class="form-horizontal col-md-6 col-md-offset-3">
                <div class="form-group">
                    <select v-model="bank.bankCode" name="bank[bankCode]" class="form-control">
                        @foreach( $banks as $bank )
                            <option value="{{ $bank->bankCode }}">{{ $bank->bankName  }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="step-pane sample-pane alert col-md-12" data-step="3">
            <h4>Choose a bank interface</h4>
            <div class="form-horizontal col-md-6 col-md-offset-3">
                <div class="form-group">
                    <select v-model="bank.bankInterface" name="bank[bankInterface]" class="form-control">
                        <option value="0">Person</option>
                        <option value="0" disabled>Company</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="step-pane sample-pane alert col-md-10 col-md-offset-1" data-step="4">
            <div class="form-horizontal col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="payer.documentType" class="control-label col-md-4">Document Type</label>
                        <div class="col-md-8">
                            <select v-model="payer.documentType" name="payer[documentType]" class="form-control">
                                <option value="CC">CC</option>
                                <option value="CE">Foreigner ID</option>
                                <option value="TI">Identity card</option>
                                <option value="PPN">Passport</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.document" class="control-label col-md-4">Document</label>
                        <div class="col-md-8">
                            <input v-model="payer.document" name="payer[document]" type="number" min="0" max="999999999"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.firstName" class="control-label col-md-4">First Name</label>
                        <div class="col-md-8">
                            <input v-model="payer.firstName" name="payer[firstName]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.lastName" class="control-label col-md-4">Last Name</label>
                        <div class="col-md-8">
                            <input v-model="payer.lastName" name="payer[lastName]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.company" class="control-label col-md-4">Company</label>
                        <div class="col-md-8">
                            <input v-model="payer.company" name="payer[company]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.emailAddress" class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input v-model="payer.emailAddress" name="payer[emailAddress]" type="email"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="payer.address" class="control-label col-md-4">Address</label>
                        <div class="col-md-8">
                            <input v-model="payer.address" name="payer[address]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.city" class="control-label col-md-4">City</label>
                        <div class="col-md-8">
                            <input v-model="payer.city" name="payer[city]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.province" class="control-label col-md-4">Province</label>
                        <div class="col-md-8">
                            <input v-model="payer.province" name="payer[province]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.country" class="control-label col-md-4">Country</label>
                        <div class="col-md-8">
                            <input v-model="payer.country" name="payer[country]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.phone" class="control-label col-md-4">Phone</label>
                        <div class="col-md-8">
                            <input v-model="payer.phone" name="payer[phone]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payer.mobile" class="control-label col-md-4">Mobile</label>
                        <div class="col-md-8">
                            <input v-model="payer.mobile" name="payer[mobile]" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//www.fuelcdn.com/fuelux/3.13.0/js/fuelux.min.js"></script>