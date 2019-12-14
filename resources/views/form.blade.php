@extends('layouts/backend')
@section('content')
<!-- Custom fonts for this template -->
<link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<body class="bg-gradient-success">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-success">User Records</h6>
    </div>
    <div class="col-lg-7">
        <div class="card-body">
            <div class="table-responsive">
                @if(isset($record)) 
                {!! Form::model($record, ['route' => ['user-records.update' , $record->id], 'method' => 'PUT', 'files' => 'true']) !!} 
                @else 
                {!! Form::open(['route' => 'user-records.store', 'method' => 'POST', 'files' => 'true']) !!} 

                @if(session()->has('detail'))
                    <div class="alert alert-success">
                        {{ session()->get('detail') }}
                    </div>
                @endif

                @endif 
                    <div class="form-group">
                    <label>Name</label>
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter your name'])}}      
                        <p class="text-danger">{{$errors->first('name')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Spouse Name</label>
                        {{Form::text('spouse_name', null, ['class' => 'form-control', 'placeholder' => 'Enter your spouse name'])}}      
                        <p class="text-danger">{{$errors->first('spouse_name')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        {{Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Enter your position'])}}      
                        <p class="text-danger">{{$errors->first('position')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Organization</label>
                        {{Form::text('organization', null, ['class' => 'form-control', 'placeholder' => 'Enter your Organization'])}}      
                        <p class="text-danger">{{$errors->first('organization')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Passport Number</label>
                        {{Form::text('passport_number', null, ['class' => 'form-control', 'placeholder' => 'Enter your passport number'])}}      
                        <p class="text-danger">{{$errors->first('passport_number')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        {{Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Your date of birth'])}}      
                        <p class="text-danger">{{$errors->first('date')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Business Address</label>
                        {{Form::textarea('business_address', null, ['maxlength' => 200,'class' => 'form-control', 'placeholder' => 'Your business address'])}}      
                        <p class="text-danger">{{$errors->first('business_address')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Residence Address</label>
                        {{Form::textarea('residence_address', null, ['maxlength' => 200,'class' => 'form-control', 'placeholder' => 'Your residence address'])}}      
                        <p class="text-danger">{{$errors->first('residence_address')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Permanent Address</label>
                        {{Form::textarea('permanent_address', null, ['maxlength' => 200,'class' => 'form-control', 'placeholder' => 'Your permanent address'])}}      
                        <p class="text-danger">{{$errors->first('permanent_address')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        {{Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter your phone'])}}      
                        <p class="text-danger">{{$errors->first('phone')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        {{Form::text('mobile_number', null, ['class' => 'form-control', 'placeholder' => 'Enter your mobile number'])}}      
                        <p class="text-danger">{{$errors->first('mobile_number')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        {{Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email'])}}      
                        <p class="text-danger">{{$errors->first('email')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Years</label>
                        {{Form::text('years', null, ['class' => 'form-control', 'placeholder' => 'How many years in Thailand'])}}      
                        <p class="text-danger">{{$errors->first('years')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        {{Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Your Facebook ID'])}}      
                        <p class="text-danger">{{$errors->first('facebook')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Viber</label>
                        {{Form::text('viber', null, ['class' => 'form-control', 'placeholder' => 'Your Viber ID'])}}      
                        <p class="text-danger">{{$errors->first('viber')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Line</label>
                        {{Form::text('line', null, ['class' => 'form-control', 'placeholder' => 'Your Line ID'])}}      
                        <p class="text-danger">{{$errors->first('line')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Skype</label>
                        {{Form::text('skype', null, ['class' => 'form-control', 'placeholder' => 'Your Skype ID'])}}      
                        <p class="text-danger">{{$errors->first('skype')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Feedback</label>
                        {{Form::textarea('feedback', null, ['class' => 'form-control', 'placeholder' => 'Your valuable feedback'])}}      
                        <p class="text-danger">{{$errors->first('feedback')}}</p>  
                    </div>
                    <div class="form-group">
                        <label>Upload your photo</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-md btn-success">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
</body>
@endsection