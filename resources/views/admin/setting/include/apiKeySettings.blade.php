{!! Form::open(array('route' => 'admin.setting.store','method'=>'POST','autocomplete'=>'off','class'=>'form-horizontal','files'=>'true')) !!}
<input type="hidden" name="step" value="apikey">
 <div class="row">
    <div class="col-md-12 text-center">
      <h3>Google Cloud Storage Settings</h3>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <label>Google Cloud Project Id: <span class="text-danger">*</span></label>
          {!! Form::text('google_cloud_project_id', old('google_cloud_project_id', $settings['google_cloud_project_id']), array('placeholder' => 'Enter Google Cloud Project Id','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <label>Google Cloud Storage Bucket: <span class="text-danger">*</span></label>
          {!! Form::text('google_cloud_storage_bucket', old('google_cloud_storage_bucket', $settings['google_cloud_storage_bucket']), array('placeholder' => 'Enter Google Cloud Project Bucket','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
          <label>Google Cloud Key File: <span class="text-danger">*</span></label>
          {!! Form::text('google_cloud_key_file', old('google_cloud_key_file', $settings['google_cloud_key_file']), array('placeholder' => 'Enter Google Cloud Key File','class' => 'form-control')) !!}
        </div>
    </div>                             
 </div>
 <hr>
<div class="row">
  <div class="col-md-12 text-center">
    <h3>Mail API Settings</h3>
  </div>
  <div class="col-md-4">
      <div class="form-group">
        <label>Mailer: <span class="text-danger">*</span></label>
        {!! Form::text('mail_mailer', old('mail_mailer', $settings['mail_mailer']), array('placeholder' => 'Enter Mail Mailer','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
        <label>Host: <span class="text-danger">*</span></label>
        {!! Form::text('mail_host', old('mail_host', $settings['mail_host']), array('placeholder' => 'Enter Mail Host','class' => 'form-control')) !!}
      </div>
  </div>
   <div class="col-md-4">
      <div class="form-group">
        <label>Port: <span class="text-danger">*</span></label>
        {!! Form::text('mail_port', old('mail_port', $settings['mail_port']), array('placeholder' => 'Enter Mail Port','class' => 'form-control')) !!}
      </div>
  </div>
   <div class="col-md-4">
      <div class="form-group">
        <label>Username: <span class="text-danger">*</span></label>
        {!! Form::text('mail_username', old('mail_username', $settings['mail_username']), array('placeholder' => 'Enter Mail Username','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
        <label>Password: <span class="text-danger">*</span></label>
        {!! Form::text('mail_password', old('mail_password', $settings['mail_password']), array('placeholder' => 'Enter Mail password','class' => 'form-control')) !!}
      </div>
  </div>
   <div class="col-md-4">
      <div class="form-group">
        <label>Encryption: <span class="text-danger">*</span></label>
        {!! Form::text('mail_encryption', old('mail_encryption', $settings['mail_encryption']), array('placeholder' => 'Enter Mail Encryption','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
        <label>Mail From Address: <span class="text-danger">*</span></label>
        {!! Form::text('mail_from_address', old('mail_from_address', $settings['mail_from_address']), array('placeholder' => 'Enter Mail From Address','class' => 'form-control')) !!}
      </div>
  </div>
  <div class="col-md-4">
      <div class="form-group">
        <label>Mail From Name: <span class="text-danger">*</span></label>
        {!! Form::text('mail_from_name', old('mail_from_name', $settings['mail_from_name']), array('placeholder' => 'Enter Mail From Name','class' => 'form-control')) !!}
      </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12 text-center">
    <h3>Firebase Settings</h3>
  </div>
  <div class="col-md-6">
      <div class="form-group">
        <label>Fcm Server Key: <span class="text-danger">*</span></label>
        {!! Form::text('fcm_server_key', old('fcm_server_key', $settings['fcm_server_key']), array('placeholder' => 'Enter Fcm Server Key','class' => 'form-control')) !!}
      </div>
  </div>
</div>
<div class="row">
    <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i> Update</button>
    </div>
</div>
{!! Form::close() !!}