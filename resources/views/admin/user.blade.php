@extends('layouts/index')
@section('content')
@include('admin.nav')
<section class="users_details">
	<div class="container">
		<h2>All Users</h2>
		<?php $result = $data['result']; if(is_array($result)){ ?>
		<table>
			<thead>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Course</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($result as $key => $value) {
					echo '<tr'; ?> <?php echo $value->id == Session::get('User_info')->id? "class='disabled'" :''; ?> <?php echo '>
					<td>'.$value->first_name.'</td>
					<td>'.$value->email.'</td>
					<td>'.$value->mobile.'</td>
					<td>'.$value->address.'</td>
					<td>'; ?>
					<?php if($value->gender == 1){
						echo '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 511.01"><path fill="#00dfc0" fill-rule="nonzero" d="m456.72 96.62-115.49 115.5c22.46 31.03 35.72 69.17 35.72 110.41 0 52.04-21.1 99.17-55.2 133.27-34.11 34.1-81.23 55.21-133.28 55.21-52.03 0-99.17-21.11-133.27-55.21C21.1 421.7 0 374.57 0 322.53c0-52.04 21.1-99.17 55.2-133.27 34.1-34.1 81.23-55.21 133.27-55.21 42.91 0 82.47 14.35 114.16 38.5L419.89 55.28h-62.84V0H512v158.91h-55.28V96.62zM282.66 228.35c-24.1-24.1-57.41-39.02-94.19-39.02s-70.08 14.92-94.18 39.02c-24.1 24.1-39.01 57.4-39.01 94.18 0 36.78 14.91 70.09 39.01 94.19 24.1 24.1 57.4 39.01 94.18 39.01 36.78 0 70.09-14.91 94.19-39.01 24.1-24.1 39.01-57.41 39.01-94.19s-14.91-70.08-39.01-94.18z"/></svg>';
					} elseif($value->gender == 2) {
						echo '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 361 511.42"><path fill="#00dfc0" fill-rule="nonzero" d="M203.64 359.53v44.17h78.58v52.94h-78.58v54.78H150.7v-54.78H72.13V403.7h78.57v-45.15c-37.91-6.3-71.82-24.41-97.83-50.42C20.21 275.47 0 230.35 0 180.5c0-49.84 20.21-94.97 52.87-127.63S130.65 0 180.5 0c49.84 0 94.97 20.21 127.63 52.87S361 130.66 361 180.5c0 49.84-20.21 94.97-52.87 127.63-27.52 27.52-63.9 46.2-104.49 51.4zM270.7 90.3c-23.08-23.08-54.98-37.36-90.2-37.36-35.23 0-67.12 14.28-90.2 37.36s-37.36 54.98-37.36 90.2c0 35.23 14.28 67.12 37.36 90.2s54.97 37.36 90.2 37.36c35.22 0 67.12-14.28 90.2-37.36s37.36-54.97 37.36-90.2c0-35.22-14.28-67.12-37.36-90.2z"/></svg>';
					} else {
						echo '<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 503 511.51"><path fill="#00dfc0" fill-rule="nonzero" d="m70.53 42.33 46.75 46.76 29.13-29.13 29.93 29.93-29.13 29.12 16.42 16.42c24.91-20.5 56.83-32.82 91.62-32.82 32.87 0 63.18 11 87.44 29.5l89.78-89.78h-48.12V0H503v121.68h-42.33v-47.7l-88.43 88.44c17.19 23.75 27.33 52.95 27.33 84.51 0 39.85-16.16 75.94-42.27 102.05-22 22-51.09 36.94-83.54 41.09v35.32h62.82v42.33h-62.82v43.79h-42.33v-43.79h-62.82v-42.33h62.82v-36.1c-30.31-5.04-57.43-19.52-78.22-40.31-26.12-26.11-42.27-62.2-42.27-102.05 0-29.63 8.93-57.17 24.25-80.09l-17.91-17.9-30.06 30.07-29.93-29.93 30.07-30.07-45.03-45.03v47.7H0V0h118.65v42.33H70.53zm256.84 132.48c-18.45-18.45-43.96-29.87-72.12-29.87-28.16 0-53.66 11.42-72.11 29.87-18.46 18.46-29.88 43.96-29.88 72.12 0 28.17 11.42 53.67 29.88 72.12 18.45 18.45 43.95 29.87 72.11 29.87 28.16 0 53.67-11.42 72.12-29.87 18.46-18.45 29.87-43.95 29.87-72.12 0-28.16-11.41-53.66-29.87-72.12z"/></svg>';
					} ?>

					<?php echo '</td>
					<td>'.$value->course.'</td>
					<td><a class="ct_btn" href="'.url('user/'.$value->id).'">Edit</a></td>
					</tr>';
				} ?>
			</tbody>
		</table>
	<?php } else { echo '<h2>No record found</h2>'; } ?>
	</div>
</section>
@stop