<div class="tab-pane fade show" id="mail-settings" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card card-primary border">
        <div class="card-header">
            <h5>Update General Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.mail-settings.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Mail Driver</label>
                            <input type="text" class="form-control" name="mail_driver" value="{{ @config('settings.mail_driver') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Mail Host</label>
                            <input type="text" class="form-control" name="mail_host" value="{{ @config('settings.mail_host') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Mail Port</label>
                            <input type="text" class="form-control" name="mail_port" value="{{ @config('settings.mail_port') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mail Username</label>
                            <input type="text" class="form-control" name="mail_username" value="{{ @config('settings.mail_username') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mail Password</label>
                            <input type="text" class="form-control" name="mail_password" value="{{ @config('settings.mail_password') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Mail Encryption</label>
                    <input type="text" class="form-control" name="mail_encryption" value="{{ @config('settings.mail_encryption') }}">
                </div>
                <div class="form-group">
                    <label>Mail Form Address</label>
                    <input type="text" class="form-control" name="mail_form_address" value="{{ @config('settings.mail_form_address') }}">
                </div>
                <div class="form-group">
                    <label>Mail Receiver Address</label>
                    <input type="text" class="form-control" name="mail_receiver_address" value="{{ @config('settings.mail_receiver_address') }}">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
