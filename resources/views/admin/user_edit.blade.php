@extends('layouts/index')
@section('content')
@include('admin.nav')
<section class="users_details">
	<div class="container">
		<?php// print_r(empty($data['result']));die('cvcv'); ?>
		<?php if(!empty($data['result'])){ $result = $data['result'] ?>
		<h2 class="main_head">Edit User <span><a href="{{ url('users') }}" class="ct_btn">Back to all users</a></span></h2>
		
		<form class="row" id="up_form" method="post" action="{{ url('user/edit/'.$result->id) }}">
		@csrf
		<!--- Success Message --->
	      @if (Session::has('up_success'))
	      <div class="alert alert-success" role="alert">{!! session::get('up_success') !!}</div>
	      @endif

	      <!---- Error Message ---->
	      @if (Session::has('up_error'))
	      <div class="alert alert-danger" role="alert">{!! session::get('up_error') !!}</div>
	      @endif

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
	        <input type="text" class="form-control form-select-sm" id="first_name" name="first_name" value="<?php if(isset($result->first_name)){echo $result->first_name; } ?>" >
	      </div>

	      <div class="col-md-4">
	        <label for="middle_name" class="form-label">Middle name</label>
	        <input type="text" class="form-control form-select-sm" id="middle_name" name="middle_name" value="<?php if(isset($result->middle_name)){echo $result->middle_name; } ?>" >
	      </div>

	      <div class="col-md-4">
	        <label for="last_name" class="form-label">Last name</label>
	        <input type="text" class="form-control form-select-sm" id="last_name" name="last_name" value="<?php if(isset($result->last_name)){echo $result->last_name; } ?>">
	      </div>

	      <div class="col-md-12">
	        <label for="select_course" class="form-label">Select Course</label>
	        <select class="form-select form-select-sm" id="select_course"  aria-label=".form-select-sm example" name="course">
	          <option disabled value="">Choose...</option>
	          <option value="c" <?php echo $result->course == 'c'? 'selected':''; ?> >C</option>
	          <option value="cpp" <?php echo $result->course == 'cpp'? 'selected':''; ?> >C++</option>
	          <option value="java" <?php echo $result->course == 'java'? 'selected':''; ?> >Java</option>
	          <option value="python" <?php echo $result->course == 'python'? 'selected':''; ?> >Python</option>
	          <option value="php" <?php echo $result->course == 'php'? 'selected':''; ?> >Php</option>
	          <option value="javascript" <?php echo $result->course == 'javascript'? 'selected':''; ?> >Javascript</option>
	        </select>
	      </div>

	      <div class="col-md-12">
	        <p>Gender</p>
	        <div class="form-outline">
	          <div class="form-check form-check-inline">
	            <input class="form-check-input" type="radio" name="gender" id="male" value="1" <?php echo $result->gender == 1? 'checked':''; ?> >
	            <label class="form-check-label" for="male">Male</label>
	          </div>
	          <div class="form-check">
	            <input class="form-check-input" type="radio" name="gender" id="female" value="2" <?php echo $result->gender == 2? 'checked':''; ?> >
	            <label class="form-check-label" for="female">Female</label>
	          </div>
	        </div>
	      </div>
      
	      <div class="col-md-6">
	        <label for="email" class="form-label">Email address</label>
	        <input type="email" class="form-control form-select-sm" id="upemail" name="email" value="<?php if(isset($result->email)){echo $result->email; } ?>" >
	      </div>

	      <div class="col-md-6">
	        <label for="mobile" class="form-label">Mobile</label>
	        <input type="text" class="form-control form-select-sm" id="mobile" name="mobile" value="<?php if(isset($result->mobile)){echo $result->mobile; } ?>" >
	      </div>  

	      <div class="col-md-12">
	        <label for="address" class="form-label">Address</label>
	        <textarea class="form-control" id="address" rows="3" name="address" ><?php if(isset($result->address)){echo $result->address; } ?></textarea>
	      </div>  

	      <input type="hidden" name="call_code" value="<?php if(isset($result->call_code)){echo $result->call_code; } ?>">
	      <div class="col-lg-12 text-center">
	        <input type="submit" value="Update" class="reg_submit ct_btn" name="reg_update">
	      </div>
	    </form>
	<?php } else { echo '<h2>No record found</h2>'; } ?>
	</div>
</section>
@stop