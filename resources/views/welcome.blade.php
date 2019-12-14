@extends('layouts.common')
@section('content')
<body>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-gradient-success"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register as a Bangladeshi in Thailand</h1>
              </div>
                @if(session()->has('detail'))
                    <div class="alert alert-success">
                        {{ session()->get('detail') }}
                    </div>
                @endif
                {!! Form::open(['route' => 'post-record', 'class' => 'user', 'method' => 'POST', 'files' => 'true']) !!} 
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
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Register Account
                </button>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection


      