@extends('layouts/index')
@section('content')
@include('admin.nav')
<section class="dashboard text-center">
	<div class="container">
		<h2>Welcome <?php echo Session::get('User_info')->first_name; ?>!</h2>
	</div>
</section>
@stop