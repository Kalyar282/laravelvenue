@extends('backend.master')
@section('style')


 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
 @endsection 

@section('content')
<div class="card shadow mb-4">
	<h1 class="h3 mb-2 text-gray-800"> Create Sub Category</h1>

	<div class="card-body">
		<a href="{{route('subcategories.index')}}"><button class="btn btn-primary" type="submit" style="float: right; margin-right: 200px;">GO Back</button></a> 
		<div class="table-responsive">

			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error) 
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form action="{{route('subcategories.store')}}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="form-group row">
					<label for= "SubCategoryName" class="col-sm-2 col-form-label">Name </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="SubCategoryName" placeholder="Enter Sub Category Name" name="name">
					</div>

				</div>

					<div class="form-group row">
					<label for= "SubCategoryName" class="col-sm-2 col-form-label">Choose Category Name</label>
					 <div class="col-sm-10">

					 	
				 	<div class="col-sm-10">
						<select class="browse-default custom-select" name="category_id">
							<option>Choose Category</option>
							@foreach($category as $row)
							<option value="{{$row->id}}">
								{{$row->name}}
							</option>
							@endforeach
       					</select>
       			
       				</div>
				 	
				</div>
					
				</div>

				<div class="form-group row"> 
					<div class ="col-sm-2"></div>
					<div class ="col-sm-10">

						<button type="submit" class="btn btn-primary"> 
							<i class="fa fa-save"> </i> Save
						</button>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('script') 


  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
  
@endsection