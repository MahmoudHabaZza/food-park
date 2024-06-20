<div class="tab-pane fade" id="stripe-setting" role="tabpanel" aria-labelledby="profile-tab4">
    <div class="card card-primary border">
        <div class="card-header">
            <h5>Update Stripe Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.stripe.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Status</label>
                            <select name="stripe_status" class="form-control select2">
                                <option @selected(@$paymentSetting->stripe_status[0]['value'] === '1') value="1">Active</option>
                                <option @selected(@$paymentSetting->stripe_status[0]['value'] === '0') value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Account Mode</label>
                            <select name="paypal_account_mode" class="form-control select2">
                                <option @selected(@$paymentSetting->paypal_account_mode[0]['value'] === 'sandbox') value="sandbox">Sandbox</option>
                                <option @selected(@$paymentSetting->paypal_account_mode[0]['value'] === 'live') value="live">Live</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Country Name</label>
                            <select name="stripe_country" class="form-control select2">
                                <option selected disabled value="">Choose</option>
                                @foreach (config('country_list') as $key => $value)
                                    <option @selected(@$paymentSetting->stripe_country[0]['value'] === $key) value="{{ $key }}">{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Account Currency</label>
                            <select name="stripe_account_currency" class="form-control select2">
                                <option selected value="" disabled>Choose</option>
                                @foreach (config('currencys.currency_list') as $currency)
                                    <option @selected(@$paymentSetting->stripe_account_currency[0]['value'] === $currency) value="{{ $currency }}">{{ $currency }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Currency Rate Per ( {{ config('settings.site_default_currency') }} )</label>
                            <input type="text" name="stripe_currency_rate" class="form-control"
                                value='{{ @$paymentSetting->stripe_currency_rate[0]['value'] }}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Key</label>
                            <input type="text" name="stripe_api_key" class="form-control"
                                value='{{ @$paymentSetting->stripe_api_key[0]['value'] }}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Secret Key</label>
                            <input type="text" name="stripe_secret_key" class="form-control"
                                value='{{ @$paymentSetting->stripe_secret_key[0]['value'] }}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Logo</label>
                            <div id="image-preview-2" class="image-preview stripe-preview">
                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                <input type="file" name="stripe_logo" id="image-upload-2" />
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

