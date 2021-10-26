@extends($adminTheme)

@section('title')
	User
@endsection

@section('breadcrumb')
    <div class="col-lg-6 col-7">
      <h6 class="h3 text-white d-inline-block mb-0">User</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-primary">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div>
@endsection

@section('newadd')
    <a href="{{ route('user.create') }}" class="btn btn-sm btn-neutral">New Add</a>
@endsection

@section('content')
<div class="col-md-12">
<div class="card">
  <!-- Card header -->
  <div class="card-header border-1">
    <h3 class="mb-0">User</h3>
  </div>
  <div class="card-body">
  <div class="table-responsive">
    <table class="table align-items-center table-flush datatable">
      <thead class="thead-light">
        <tr>
          <th width="5px" class="sort" data-sort="name">#</th>
          <th width="40px" class="sort" data-sort="budget">Photo</th>
          <th scope="col" class="sort" data-sort="budget">Name</th>
          <th scope="col" class="sort" data-sort="status">Email</th>
          <th width="80px" class="sort" data-sort="completion">Action</th>
        </tr>
      </thead>
      <tbody class="list">
        @forelse($users as $key => $user)
          <tr>
            <td>
              {{ ++$key }}
            </td>
            <td>
              <img src="{{ $user->photoPath }}" class="avatar avatar-lg" alt="">
            </td>
            <td>
              {{ $user->name }}
            </td>
            <td>
              {{ $user->email }}
            </td>
            <td>
              <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-sm" data-tooltip="tooltip" data-placement="top" title="Edit User"><i class="fas fa-pen"></i></a>
               <button class="btn btn-danger btn-flat btn-sm remove-crud" data-id="{{ $user->id }}" data-action="{{ route('user.destroy',$user->id) }}" data-tooltip="tooltip" data-placement="top" title="Delete User"> <i class="fas fa-trash"></i></button>
            </td>
          </tr>
        @empty

        @endforelse
      </tbody>
    </table>
  </div>
  </div>
</div>
</div>
@endsection
    
