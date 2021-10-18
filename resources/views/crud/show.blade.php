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
        .single-student img{
            width: 200px;
            height: 200px;
            border: 10px solid rgb(240, 245, 245);
            border-radius: 50%;
            margin: auto;
            display: block;
        }

        .single-student{
            /* border-right:10px solid rgb(231, 209, 6);
            border-left:  */ 
            border: 10px solid rgb(240, 245, 245);
            margin: 0px;
            background: #17a2b8;
        }
        .single-student h2{
            color: rgb(240, 245, 245);
            font-family: candara;
            text: bold;
        }
        .tables tr td{
            color: rgb(240, 245, 245);
        }
        .single-student span{
            color: yellow;
        }
    </style>

</head>
<body>
	
	

	<div class="wrap ">
		<a class="btn btn-info btn-sm" href="{{ url('crud-all') }}">All-Student</a>
		<div class="card shadow">
			<div class="card-body single-student">

                <img class="shadow" src="{{ URL::to('/')}}/media/students/{{ $show_student  -> photo }}" alt=""><br>
                <h2 class="text-center">Single Data of :<span> {{ $show_student  -> name }} </span></h2>
                <table class="table table-striped tables">
                    <tr>
                        <td>Name</td>
                        <td>{{ $show_student  -> name }}</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>{{ $show_student  -> username }}</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>{{ $show_student  -> email }}</td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td>{{ $show_student  -> cell }}</td>
                    </tr>
                </table>
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