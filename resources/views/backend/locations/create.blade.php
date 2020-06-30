@extends('backend.master')
@section('content')

<div class="row">
	<h1 class="px-5">Create Location</h1>
</div>
<div class="card shadow mt-4">
	<div class="card-header">
		<div class="row">
			<div class="col-lg-10 pt-2">
				<h5>Add New Location</h5>
			</div>
			<div class="col-lg-2">
				<a href="{{route('locations.index')}}" class="btn btn-primary float-right">Back</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		@if ($errors->any())
		 <div class="alert alert-danger">
		 	<ul>
		 		@foreach ($errors->all() as $error)
		 		<li>{{ $error }}</li>
		 		@endforeach
		 	</ul>
		 </div>
		 @endif
		<form action="{{route('locations.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="name" class="col-lg-2">Address:</label>
				<div class="col-lg-10">
					<input type="text" name="address" id="name" placeholder="Enter the location">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
					<input type="submit" value="Save" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>

@endsection