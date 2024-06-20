<div class="tab-pane fade" id="razorpay-setting" role="tabpanel" aria-labelledby="contact-tab4">
        <div class="card card-primary border">
        <div class="card-header">
            <h5>Update razorpay Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.razorpay.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Razorpay Status</label>
                            <select name="razorpay_status" class="form-control select2">
                                <option @selected(@$paymentSetting->razorpay_status[0]['value'] === '1') value="1">Active</option>
                                <option @selected(@$paymentSetting->razorpay_status[0]['value'] === '0') value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Razorpay Country Name</label>
                            <select name="razorpay_country" class="form-control select2">
                                <option selected disabled value="">Choose</option>
                                @foreach (config('country_list') as $key => $value)
                                    <option @selected(@$paymentSetting->razorpay_country[0]['value'] === $key) value="{{ $key }}">{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Razorpay Account Currency</label>
                            <select name="razorpay_account_currency" class="form-control select2">
                                <option selected value="" disabled>Choose</option>
                                @foreach (config('currencys.currency_list') as $currency)
                                    <option @selected(@$paymentSetting->razorpay_account_currency[0]['value'] === $currency) value="{{ $currency }}">{{ $currency }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Currency Rate Per ( {{ config('settings.site_default_currency') }} )</label>
                            <input type="text" name="razorpay_currency_rate" class="form-control"
                                value='{{ @$paymentSetting->razorpay_currency_rate[0]['value'] }}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Razorpay Key</label>
                            <input type="text" name="razorpay_api_key" class="form-control"
                                value='{{ @$paymentSetting->razorpay_api_key[0]['value'] }}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Razorpay Secret Key</label>
                            <input type="text" name="razorpay_secret_key" class="form-control"
                                value='{{ @$paymentSetting->razorpay_secret_key[0]['value'] }}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Stripe Logo</label>
                            <div id="image-preview-3" class="image-preview razorpay-preview">
                                <label for="image-upload-3" id="image-label-3">Choose File</label>
                                <input type="file" name="razorpay_logo" id="image-upload-3" />
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
