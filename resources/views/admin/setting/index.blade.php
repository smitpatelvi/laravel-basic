@extends($adminTheme)

@section('title')
	Settings
@endsection

@section('breadcrumb')
    <div class="col-lg-6 col-7">
      <h6 class="h3 text-white d-inline-block mb-0">Settings</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-primary">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active">Settings</li>
        </ol>
      </nav>
    </div>
@endsection

@section('content')
<div class="col-md-12">
<div class="card">
  <!-- Card header -->
  <div class="card-header border-1">
    <h3 class="mb-0">Settings</h3>
  </div>
  <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-wrapper">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                  <li class="nav-item">
                      <a class="{{ Request::old('step') == 'basic' || Request::old('step') == '' ? 'active' : '' }} nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#basic" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-home mr-2"></i>Basic</a>
                  </li>
                  <li class="nav-item">
                      <a class="{{ Request::old('step') == 'apikey' ? 'active' : '' }} nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#apikey" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-key mr-2"></i>API Key</a>
                  </li>
              </ul>
          </div>
          <div class="card shadow">
              <div class="card-body">
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade  {{ Request::old('step') == 'basic' || Request::old('step') == '' ? 'show active' : '' }}" id="basic" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                         @include('admin.setting.include.basicSettings')
                      </div>
                      <div class="tab-pane fade {{ Request::old('step') == 'apikey' ? 'active show' : '' }}" id="apikey" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                         @include('admin.setting.include.apiKeySettings')
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
@endsection
