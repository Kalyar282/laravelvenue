@extends('backend.master')
@section('content')

<div class="row">
	<h1 class="px-5">Edit Form</h1>
</div>
<div class="card shadow mt-4">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-10 pt-2">
				<h5>Edit Category</h5>
			</div>
			<div class="col-sm-2">
				<a href="{{route('categories.index')}}" class="btn btn-primary float-right">Back</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<!-- Error Validation -->
		@if ($errors->any())
		 <div class="alert alert-danger">
		 	<ul>
		 		@foreach ($errors->all() as $error)
		 		<li>{{ $error }}</li>
		 		@endforeach
		 	</ul>
		 </div>
		 @endif
		<form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row">
				<label for="name" class="col-sm-2">Name:</label>
				<div class="col-sm-10">
					<input type="text" name="name" id="name" placeholder="Category Name" value="{{$category->name}}">
				</div>
			</div>
			<div class="form-group row">
				<label for="photo" class="col-sm-2">Photo:</label>
				<div class="col-sm-10">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#old" class="nav-link active" data-toggle="tab">Old Photo</a>
						</li>
						<li class="nav-item">
							<a href="#new" class="nav-link" data-toggle="tab">New Photo</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane fade show active mt-3" id="old" role="tabpanel">
							<img src="{{asset($category->photo)}}" class="img-fluid w-25">
							<input type="hidden" name="oldphoto" value="{{$category->photo}}">
						</div>

						<div class="tab-pane fade mt-3" id="new" role="tabpanel">
						<input type="file" name="photo" id="photo" accept="images/*">
					</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<input type="submit" value="Update" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
@endsection