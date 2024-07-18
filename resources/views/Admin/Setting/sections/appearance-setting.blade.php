<div class="tab-pane fade show" id="appearance-settings" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card card-primary border">
        <div class="card-header">
            <h5>Appearance Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.appearance-settings.update') }}" method="POST">
                <div class="row">
                    <div class="col-6">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label>Primary Color</label>
                        <input type="text" name="color" value="{{ @config('settings.color') }}" class="form-control colorpickerinput colorpicker-element">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
