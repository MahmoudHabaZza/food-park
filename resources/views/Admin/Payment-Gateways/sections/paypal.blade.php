<div class="tab-pane fade show active" id="paypal-settings" role="tabpanel"
aria-labelledby="home-tab4">
<div class="card card-primary border">
    <div class="card-header">
        <h5>Update General Settings</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.setting.general-settings.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Status</label>
                        <select name="" class="form-control select2">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Account Mode</label>
                        <select name="" class="form-control select2">
                            <option value="sandbox">Sandbox</option>
                            <option value="live">Live</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Country Name</label>
                        <select name="" class="form-control select2">
                            <option value="sandbox">Sandbox</option>
                            <option value="live">Live</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Account Currency</label>
                        <select name="site_default_currency" class="form-control select2">
                            <option value="" disabled>Choose</option>
                            @foreach (config('currencys.currency_list') as $currency )
                            <option @selected(config('settings.site_default_currency') === $currency)  value="{{ $currency }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Currency Rate</label>
                        <input type="text" name="" class="form-control"  value="" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Client Id</label>
                        <input type="text" name="" class="form-control"  value="" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Secret Key</label>
                        <input type="text" name="" class="form-control"  value="" />
                    </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <label>Image</label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="avatar" id="image-upload" />
                    </div>
                </div>
            </div>

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</div>
