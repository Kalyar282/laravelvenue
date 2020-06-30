@extends('backend.master')

@section('content')

<div class="row">
	<h1 class="px-5">Create Category</h1>
</div>
<div class="card shadow mt-4">
	<div class="card-header">
		<div class="row">
			<div class="col-lg-10 pt-2">
				<h5>New Category</h5>
			</div>
			<div class="col-lg-2">
				<a href="{{route('categories.index')}}" class="btn btn-primary float-right">Back</a>
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

		<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group row">
				<label for="name" class="col-lg-2">Name:</label>
				<div class="col-lg-10">
					<input type="text" name="name" id="name" placeholder="Category Name">
				</div>
			</div>
			<div class="form-group row">
				<label for="photo" class="col-lg-2">Photo:</label>
				<div class="col-lg-10">
					<input type="file" name="photo" id="photo" accept="images/*">
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