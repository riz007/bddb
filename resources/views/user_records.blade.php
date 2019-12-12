@extends('layouts/backend')
@section('content')
<!-- Custom fonts for this template -->
<link href="{{asset('front/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


 <!-- DataTales Example -->
 <!-- <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Records</h6>
    <h6 class="m-0 font-weight-bold text-primary">

    <a href="{{ url('/export-excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </h6>
  </div> -->
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 py-3">
    <h1 class="h3 mb-0 text-gray-800">User Records</h1>
    <a href="{{route('user-records.create')}}">Add User</a>
    <a href="{{ url('/export-excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
  <div class="card-body">
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
            <td><img src="{{asset($record->image)}}" alt="" height="200" width="200"></td>
            <td>{{$record->name}}</td>
            <td>{{$record->position}}</td>
            <td>{{$record->organization}}</td>
            <td>{{$record->passport_number}}</td>
            <td>
              <a href="{{ route('user-records.edit', $record->id)}}" class="btn btn-success btn-user btn-block">Edit</a>
              <form action="{{ route('user-records.destroy' , $record->id ) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="btn btn-danger btn-user btn-block">Delete</button>
              </form>
            </td>
          </tr>
          @php $i = $i+1; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection