@if ($errors->any())
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @foreach ($errors->all() as $error)
          {{ $error }} <br>
        @endforeach
      </div>
    </div>
  </div>
@endif

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="name">Name: <span class="text-danger">*</span></label>
      <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" 
             class="form-control" placeholder="Enter Name">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="email">Email: <span class="text-danger">*</span></label>
      <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" 
             class="form-control" placeholder="Enter Email">
    </div>
  </div>
</div>

@if(!isset($user))
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="password">Password: <span class="text-danger">*</span></label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="confirm_password">Confirm Password: <span class="text-danger">*</span></label>
        <input type="password" name="confirm_password" id="confirm_password" 
               class="form-control" placeholder="Enter Confirm Password">
      </div>
    </div>
  </div>
@endif

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="photo">Photo:</label>
      <div class="custom-file">
        <input type="file" name="photo" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    @if(isset($user) && $user->photoPath)
      <img src="{{ $user->photoPath }}" alt="Profile Photo" class="profile-pic">
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-12 text-center">
    <button type="submit" class="btn btn-success btn-md">
      <i class="far fa-save"></i> Save
    </button>
  </div>
</div>
