@if (count($errors) > 0)
      <div class="row">
        <div class="col-md-12 col-md-offset-2">
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              @foreach($errors->all() as $error)
              {{ $error }} <br>
             @endforeach      
          </div>
        </div>
      </div>
  @endif
  <div class="row">
    <div class="col-md-6">
          <div class="form-group">
            <label for="">Name: <span class="text-danger">*</span></label>
            {!! Form::text('name',null,array('class'=>'form-control','placeholder' => 'Enter Name')) !!}
          </div>
    </div>
    <div class="col-md-6">
          <div class="form-group">
            <label for="">Email: <span class="text-danger">*</span></label>
            {!! Form::email('email',null,array('class'=>'form-control','placeholder' => 'Enter Email')) !!}
          </div>
    </div>
  </div>
  @if(!isset($admin_user))
    <div class="row">
      <div class="col-md-6">
           <div class="form-group">
              <label for="">Password: <span class="text-danger">*</span></label>
              {!! Form::password('password', array('placeholder' => 'Enter Password','class' => 'form-control')) !!}
            </div>
      </div>
       <div class="col-md-6">
            <div class="form-group">
              <label for="">Confirm Password: <span class="text-danger">*</span></label>
              {!! Form::password('confirm_password', array('placeholder' => 'Enter Confirm Password','class' => 'form-control')) !!}
            </div>
      </div>
    </div>
  @endif
  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <label for="">Photo:</label>
              <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
          </div>
      </div>
      <div class="col-md-6">
        @if(isset($user))
          <img src="{{ $admin_user->photoPath }}" alt="" class="profile-pic">
        @endif
      </div>
  </div>
  <div class="row">
      <div class="col-md-12 text-center">
          <button class="btn btn-success btn-md"><i class="far fa-save"></i> Save</button>
      </div>
  </div>