@extends($adminTheme)

@section('title')
 Admin Profile
@endsection

@section('breadcrumb')
    <div class="col-lg-6 col-7">
      <h6 class="h3 text-white d-inline-block mb-0">Admin Profile</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-primary">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active">Admin Profile</li>
        </ol>
      </nav>
    </div>
@endsection

@section('newadd')
    <a href="{{ route('admin-user.index') }}" class="btn btn-sm btn-neutral">Back</a>
@endsection

@section('content')
<div class="col-md-12">
<div class="card">
  <!-- Card header -->
  <div class="card-header border-1">
    <h3 class="mb-0">Admin Profile</h3>
  </div>
  <div class="card-body">
      {!! Form::model($user, ['method' => 'POST','route' => "admin.upadte",'class'=>'form-horizontal','files'=>true]) !!} 
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
                  <img src="{{ $user->photoPath }}" alt="" class="avatar avatar-lg">
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 text-center">
                  <button class="btn btn-success btn-md"><i class="far fa-save"></i> Save</button>
              </div>
          </div>
      {!! Form::close() !!}
  </div>
</div>
</div>
@endsection
