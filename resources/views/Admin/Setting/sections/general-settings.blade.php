<div class="tab-pane fade show active" id="general-settings" role="tabpanel"
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Site Name</label>
                                                        <input type="text" name="site_name" class="form-control"  value="{{ config('settings.site_name'), }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Site Default Currency</label>
                                                        <select name="site_default_currency" class="form-control select2">
                                                            <option value="" disabled>Choose</option>
                                                            @foreach (config('currencys.currency_list') as $currency )
                                                            <option @selected(config('settings.site_default_currency') === $currency)  value="{{ $currency }}">{{ $currency }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Currency Icon</label>
                                                        <input type="text" name="site_currency_icon"
                                                            class="form-control" value="{{ config('settings.site_currency_icon') }}" />
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Currency Posision</label>
                                                        <select name="site_default_currency_position"
                                                            class="form-control select2">
                                                            <option @selected( config('settings.site_default_currency_position') === 'right' ) value="right">Right</option>
                                                            <option @selected( config('settings.site_default_currency_position') === 'left' ) value="left">Left</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
