@extends('layouts/backend')
@section('content')
<div class="card-body">
  <div class="d-sm-flex align-items-center justify-content-between mb-4 py-3">
    <h1 class="h3 mb-0 m-0 font-weight-bold text-success">User Records</h1>
    <a href="{{route('user-records.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add User</a>
    <a href="{{ url('/export-excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Data</a>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>SN.</th>
          <th>Image</th>
          <th>Name</th>
          <th>Position</th>
          <th>Organization</th>
          <th>Passport/ID</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>SN.</th>
          <th>Image</th>
          <th>Name</th>
          <th>Position</th>
          <th>Organization</th>
          <th>Passport/ID</th>
          <th>Actions</th>
        </tr>
      </tfoot>
      <tbody>
        @php $i = 1; @endphp
        @foreach($user_records as $record)
        <tr>
          <td>{{$i}}</td>
          <td><img src="{{asset($record->image)}}" alt="profile-picture" width="250"></td>
          <td>{{$record->name}}</td>
          <td>{{$record->position}}</td>
          <td>{{$record->organization}}</td>
          <td>{{$record->passport_number}}</td>
          <td>
            <span>
            <a style="text-decoration: none;" href="{{ route('user-records.edit', $record->id)}}">
                <i class="fas fa-edit fa-2x text-info"></i>
              </a>
            </span>
            <span>
              <a style="text-decoration: none; margin-left: 15px;" href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal">
                <i style="cursor: pointer;" class="fa fa-trash fa-2x text-danger"></i>
              </a>
            </span>
          </td>
        </tr>
        @php $i = $i+1; @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Delete" below if you are ready to delete the current Bangladeshi's info.</div>
    <div class="modal-footer">
      <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
      <form style="display: inline; margin-left: 15px;" action="{{ route('user-records.destroy' , $record->id ) }}" method="POST" >
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button class="btn btn-secondary" type="submit">Delete</button>
      </form>
  </div>
</div>
</div>
</div>
@endsection