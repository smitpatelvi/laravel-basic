@extends($adminTheme)

@section('title')
	Dashboard
@endsection

@section('middle-box')
<style type="text/css">
  .middle-box{
    height: 300px;
  }
</style>
@endsection

@section('breadcrumb')
    <div class="col-lg-6 col-7">
      <h6 class="h3 text-white d-inline-block mb-0">Dashboard</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item active"><i class="fas fa-home"></i></li>
        </ol>
      </nav>
    </div>
@endsection

@section('content')
<div class="col-xl-3 col-md-6">
  <div class="card card-stats">
    <!-- Card body -->
    <div class="card-body">
      <div class="row">
        <div class="col">
          <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
          <span class="h2 font-weight-bold mb-0">89</span>
        </div>
        <div class="col-auto">
          <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
            <i class="fas fa-users"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="width:50px;"></div>
@endsection