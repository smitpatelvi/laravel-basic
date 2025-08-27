<form action="{{ route('admin.setting.store') }}" method="POST" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="step" value="basic">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Page Title: <span class="text-danger">*</span></label>
                <input type="text" name="page_title" class="form-control" placeholder="Enter Page Title"
                    value="{{ old('page_title', $settings['page_title']) }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Logo: </label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse… <input type="file" name="logo" class="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label"><strong>Current Logo</strong></label>
            <div class="controls">
                <img src="{{ asset('/upload/setting/' . $settings['logo']) }}" style="height:60px;width:120px; margin-bottom:8px;" class="img-thumbnail">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Favicon Icon:</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file">
                            Browse… <input type="file" name="favicon_icon" class="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label"><strong>Current Favicon Icon</strong></label>
            <div class="controls">
                <img src="{{ asset('/upload/setting/' . $settings['favicon_icon']) }}" style="height:50px;width:50px; margin-bottom:8px;" class="img-thumbnail">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Update</button>
        </div>
    </div>
</form>
