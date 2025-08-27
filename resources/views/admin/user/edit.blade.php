@extends($adminTheme)

@section('title')
    Edit User
@endsection

@section('breadcrumb')
<div class="col-lg-6 col-7">
    <h6 class="h3 text-white d-inline-block mb-0">User</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-primary">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>
</div>
@endsection

@section('newadd')
<a href="{{ route('user.index') }}" class="btn btn-sm btn-neutral">Back</a>
@endsection

@section('content')
<div class="col-md-12">
<div class="card">
    <!-- Card header -->
    <div class="card-header border-1">
        <h3 class="mb-0">Edit User</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('admin.user.form')
        </form>
    </div>
</div>
</div>
@endsection
