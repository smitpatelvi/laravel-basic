@extends($adminTheme)

@section('title')
    Edit Admin
@endsection

@section('breadcrumb')
    <div class="col-lg-6 col-7">
        <h6 class="h3 text-white d-inline-block mb-0">Admin</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-primary">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.index') }}">Admin</a>
                </li>
                <li class="breadcrumb-item active">Edit Admin</li>
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
            <h3 class="mb-0">Edit Admin</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin-user.update', $admin_user->id) }}" 
                  method="POST" 
                  class="form-horizontal" 
                  enctype="multipart/form-data">
                  
                @csrf
                @method('PATCH')

                @include('admin.adminUser.form', ['admin_user' => $admin_user])

            </form>
        </div>
    </div>
</div>
@endsection
