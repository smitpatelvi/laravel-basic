<form action="{{ route('admin.setting.store') }}" method="POST" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="step" value="apikey">

    <!-- Google Cloud Storage Settings -->
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Google Cloud Storage Settings</h3>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Google Cloud Project Id: <span class="text-danger">*</span></label>
                <input type="text" name="google_cloud_project_id" class="form-control"
                    placeholder="Enter Google Cloud Project Id"
                    value="{{ old('google_cloud_project_id', $settings['google_cloud_project_id']) }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Google Cloud Storage Bucket: <span class="text-danger">*</span></label>
                <input type="text" name="google_cloud_storage_bucket" class="form-control"
                    placeholder="Enter Google Cloud Project Bucket"
                    value="{{ old('google_cloud_storage_bucket', $settings['google_cloud_storage_bucket']) }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Google Cloud Key File: <span class="text-danger">*</span></label>
                <input type="text" name="google_cloud_key_file" class="form-control"
                    placeholder="Enter Google Cloud Key File"
                    value="{{ old('google_cloud_key_file', $settings['google_cloud_key_file']) }}">
            </div>
        </div>
    </div>

    <hr>

    <!-- Mail API Settings -->
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Mail API Settings</h3>
        </div>

        @foreach ([
            'mail_mailer' => 'Mailer',
            'mail_host' => 'Host',
            'mail_port' => 'Port',
            'mail_username' => 'Username',
            'mail_password' => 'Password',
            'mail_encryption' => 'Encryption',
            'mail_from_address' => 'Mail From Address',
            'mail_from_name' => 'Mail From Name'
        ] as $field => $label)
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ $label }}: <span class="text-danger">*</span></label>
                    <input type="text" name="{{ $field }}" class="form-control"
                        placeholder="Enter {{ $label }}"
                        value="{{ old($field, $settings[$field]) }}">
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    <!-- Firebase Settings -->
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Firebase Settings</h3>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Fcm Server Key: <span class="text-danger">*</span></label>
                <input type="text" name="fcm_server_key" class="form-control"
                    placeholder="Enter Fcm Server Key"
                    value="{{ old('fcm_server_key', $settings['fcm_server_key']) }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Update</button>
        </div>
    </div>
</form>
