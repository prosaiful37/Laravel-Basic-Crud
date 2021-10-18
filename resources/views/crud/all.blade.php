<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('crud/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('crud/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('crud/assets/css/responsive.css') }}">
</head>
<body>
	


	<div class="wrap-table ">
		<a class="btn btn-info btn-sm" href="{{ url('crud-app') }}">Add-Data</a>
		<div class="card">
			<div class="card-body shadow">
				<h2>All Data</h2>
				@include('validation')
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>UserName</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						@foreach($students as $student)
		
						<tr>
							<td>{{ $loop -> index + 1 }}</td>
							<td>{{ $student -> name }}</td>
							<td>{{ $student -> username }}</td>
							<td>{{ $student -> email }}</td>
							<td>{{ $student -> cell }}</td>
							<td><img src="{{ URL::to('media/students/' .  $student -> photo ) }}" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="{{ url('crud-show/' .  $student -> id) }}">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="{{ url('crud-delete/'. $student -> id) }}">Delete</a>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="{{ url('crud/assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ url('crud/assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('crud/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('crud/assets/js/custom.js') }}"></script>
</body>
</html>