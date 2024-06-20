<div class="tab-pane fade show active" id="paypal-settings" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card card-primary border">
        <div class="card-header">
            <h5>Update Paypal Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.paypal.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Status</label>
                            <select name="paypal_status" class="form-control select2">
                                <option @selected(@$paymentSetting->paypal_status[0]['value'] === '1') value="1">Active</option>
                                <option @selected(@$paymentSetting->paypal_status[0]['value'] === '0') value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Account Mode</label>
                            <select name="paypal_account_mode" class="form-control select2">
                                <option @selected(@$paymentSetting->paypal_account_mode[0]['value'] === 'sandbox') value="sandbox">Sandbox</option>
                                <option @selected(@$paymentSetting->paypal_account_mode[0]['value'] === 'live') value="live">Live</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Country Name</label>
                            <select name="paypal_country" class="form-control select2">
                                <option selected disabled value="">Choose</option>
                                @foreach (config('country_list') as $key => $value)
                                    <option @selected(@$paymentSetting->paypal_country[0]['value'] === $key) value="{{ $key }}">{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Account Currency</label>
                            <select name="paypal_account_currency" class="form-control select2">
                                <option selected value="" disabled>Choose</option>
                                @foreach (config('currencys.currency_list') as $currency)
                                    <option @selected(@$paymentSetting->paypal_account_currency[0]['value'] === $currency) value="{{ $currency }}">{{ $currency }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Currency Rate Per ( {{ config('settings.site_default_currency') }} )</label>
                            <input type="text" name="paypal_currency_rate" class="form-control"
                                value='{{@$paymentSetting->paypal_currency_rate[0]['value']}}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Client Id</label>
                            <input type="text" name="paypal_api_key" class="form-control"
                                value='{{@$paymentSetting->paypal_api_key[0]['value']}}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Secret Key</label>
                            <input type="text" name="paypal_secret_key" class="form-control"
                                value='{{@$paymentSetting->paypal_secret_key[0]['value']}}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal App Id</label>
                            <input type="text" name="paypal_app_id" class="form-control"
                                value='{{@$paymentSetting->paypal_app_id[0]['value']}}' />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Paypal Logo</label>
                            <div id="image-preview" class="image-preview paypal-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="paypal_logo" id="image-upload" />
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@section('js')
    <script>
        $(document).ready(function() {
                var paypalImagePath = '{{ asset(@$paymentSetting->paypal_logo[0]["value"]) }}';
                $('.paypal-preview').css({
                'background-image': "url('" + paypalImagePath + "')",
                'background-size': 'cover',
                'background-position': 'center center'
                });


                var stripeImagePath = '{{ asset(@$paymentSetting->stripe_logo[0]["value"]) }}';
                $('.stripe-preview').css({
                    'background-image': "url('" + stripeImagePath + "')",
                    'background-size': 'cover',
                    'background-position': 'center center'
                });

            $.uploadPreview({
                input_field: "#image-upload-2", // Default: .image-upload
                preview_box: "#image-preview-2", // Default: .image-preview
                label_field: "#image-label-2", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

                var razorpayImagePath = '{{ asset(@$paymentSetting->razorpay_logo[0]["value"]) }}';
                $('.razorpay-preview').css({
                    'background-image': "url('" + razorpayImagePath + "')",
                    'background-size': 'cover',
                    'background-position': 'center center'
                });

            $.uploadPreview({
                input_field: "#image-upload-3", // Default: .image-upload
                preview_box: "#image-preview-3", // Default: .image-preview
                label_field: "#image-label-3", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });



        });
    </script>
@endsection
