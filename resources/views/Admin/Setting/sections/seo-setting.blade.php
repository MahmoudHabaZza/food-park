<div class="tab-pane fade show" id="seo-settings" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card card-primary border">
        <div class="card-header">
            <h5>SEO Settings</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.seo-settings.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ @config('settings.seo_title') }}">
                </div>
                <div class="form-group">
                    <label>SEO Description</label>
                    <textarea name="seo_description" class="form-control">{!! @config('settings.seo_description') !!}</textarea>
                </div>
                <div class="form-group">
                    <label>SEO Keywords</label>
                    <input type="text" name="seo_keywords" value="{{ @config('settings.seo_keywords') }}" class="form-control inputtags" id="">

                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
