<div class="tab-pane fade show" id="pusher-settings" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card card-primary border">
        <div class="card-header">
            <h5>Update General Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.pusher-settings.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Pusher App Id</label>
                    <input type="text" class="form-control" name="pusher_app_id"
                        value="{{ @config('settings.pusher_app_id') }}">
                </div>
                <div class="form-group">
                    <label>Pusher Key</label>
                    <input type="text" class="form-control" name="pusher_key"
                        value="{{ @config('settings.pusher_key') }}">
                </div>
                <div class="form-group">
                    <label>Pusher Secret Key</label>
                    <input type="text" class="form-control" name="pusher_secret_key"
                        value="{{ @config('settings.pusher_secret_key') }}">
                </div>
                <div class="form-group">
                    <label>Pusher Cluster</label>
                    <input type="text" class="form-control" name="pusher_cluster"
                        value="{{ @config('settings.pusher_cluster') }}">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
