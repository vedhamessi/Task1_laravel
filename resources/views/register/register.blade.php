@extends('layouts/index')
@section('content')
<section class="registration">
  <div class="container">
    <form class="row" id="register_form" method="post" action="{{ url('register') }}">
        @csrf
      <h2>Registration Form</h2>
      <!--- Success Message --->
      @if (Session::has('reg_success'))
      <div class="alert alert-success" role="alert">{!! session::get('reg_success') !!}</div>
      @endif

      <!---- Error Message ---->
      @if (Session::has('reg_error'))
      <div class="alert alert-danger" role="alert">{!! session::get('reg_error') !!}</div>
      @endif

      <?php// echo form_error('last_name'); ?>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <div class="col-md-4">
        <label for="first_name" class="form-label">First name</label>
        <input type="text" class="form-control form-select-sm" id="first_name" name="first_name" value="{{ old('first_name') }}" >
      </div>

      <div class="col-md-4">
        <label for="middle_name" class="form-label">Middle name</label>
        <input type="text" class="form-control form-select-sm" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" >
      </div>

      <div class="col-md-4">
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" class="form-control form-select-sm" id="last_name" name="last_name" value="{{ old('last_name') }}">
      </div>

      <div class="col-md-12">
        <label for="select_course" class="form-label">Select Course</label>
        <select class="form-select form-select-sm" id="select_course"  aria-label=".form-select-sm example" name="course">
          <option selected disabled value="">Choose...</option>
          <option value="c">C</option>
          <option value="cpp">C++</option>
          <option value="java">Java</option>
          <option value="python">Python</option>
          <option value="php">Php</option>
          <option value="javascript">Javascript</option>
        </select>
      </div>

      <div class="col-md-12">
        <p>Gender</p>
        <div class="form-outline">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="1" >
            <label class="form-check-label" for="male">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="2" >
            <label class="form-check-label" for="female">Female</label>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control form-select-sm" id="email" name="email" value="{{ old('email') }}" >
        <div class="ac_email_res-main" style="display: none;">
          <span class="ac_email_res" style="display: none;"></span>
        </div>
      </div>

      <div class="col-md-6">
        <label for="mobile" class="form-label">Mobile</label>
        <input type="text" class="form-control form-select-sm" id="mobile" name="mobile" value="{{ old('mobile') }}" >
      </div>  

      <div class="col-md-12">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" rows="3" name="address" value="{{ old('address') }}" ></textarea>
      </div>  

      <div class="col-lg-6">
        <label for="password" class="col-form-label">Password</label>
        <input type="password" class="form-control form-select-sm" id="password" name="password" value="" >
      </div>

      <div class="col-lg-6">
        <label for="password2" class="col-form-label">Re-type password</label>
        <input type="password" class="form-control form-select-sm" id="password2" name="password2" value="" >
      </div>

      
      <input type="hidden" name="call_code" value="">
      <div class="col-lg-12 text-center">
        <input type="submit" value="submit" class="reg_submit ct_btn" name="reg_submit">
      </div>
    </form>
  </div>
</section>
@stop 