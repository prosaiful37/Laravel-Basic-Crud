<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('crud/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('crud/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('crud/assets/css/responsive.css') }}">

    <style>
        .edit-student{
            background: rgb(181, 207, 140);
        }
        .edit-student h2{
            color: rgb(46, 21, 21);
            font-family: candara;
            text-align: center;
        }
    </style>


</head>
<body>
	
	

	<div class="wrap ">
		<a class="btn btn-info btn-sm" href="{{ url('crud-all') }}">All-Student</a>
		<div class="card shadow">
			<div class="card-body edit-student">
				<h2>Update {{ $student_edit  -> name }} Data</h2>
				@include('validation')
				<form action="{{ url('crud-update/' . $student_edit  -> id ) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{ $student_edit  -> name }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" value="{{ $student_edit  -> username }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{ $student_edit  -> email }}" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{ $student_edit  -> cell }}" type="text">
					</div>
					<div class="form-group">
						<img class="shadow" style="width: 200px;height:200px;" src="{{ URL::to('/') }}/media/students/{{ $student_edit  -> photo }}" alt="">
                        <input type="hidden" name="old_photo" value="{{ $student_edit  -> photo }}">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="new_photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	







	<!-- JS FILES  -->
	<script src="{{ URL::to('crud/assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('crud/assets/js/popper.min.js') }}"></script>
	<script src="{{ url('crud/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('crud/assets/js/custom.js') }}"></script>
</body>
</html>