@extends('backend.master')
@section('style')


 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
 @endsection 

@section('content')
<div class="card shadow mb-4">
	<h1 class="h3 mb-2 text-gray-800"> Create New Rooms</h1>

	<div class="card-body">
		<a href="{{route('rooms.index')}}"><button class="btn btn-primary" type="submit" style="float: right; margin-right: 200px;">GO Back</button></a> 
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
			<form action="{{route('rooms.store')}}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="form-group row">
					<label for= "roomname" class="col-sm-2 col-form-label">Name </label>
					<div class="col-sm-10">
						<input type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus   id="roomname" placeholder="Enter Room Name" name="name">
					</div>
				</div>

				<div class="form-group row">
					<label for= "photo" class="col-sm-2 col-form-label">Photo</label>
					<div class="col-sm-10">
						<input type="file" id="photo" name="photo" accept="image/*">
					</div>
				</div>

       			 <div class="form-group row">
						<label for= "Location Name" class="col-sm-2 col-form-label">Choose Locations</label>
						<div class="col-sm-10">
						<div class="col-sm-10">
						<select class="browse-default custom-select" name="location">
						<option>Choose Locations</option>
						@foreach($locations as $row)
						<option value="{{$row->id}}">
						{{$row->address}}
						</option>
						@endforeach
						</select>
						</div>
						</div>
				</div>

       			<div class="form-group row">
					<label for= "categoryname" class="col-sm-2 col-form-label">Choose Date</label>
					<div class="col-sm-10">
						<select class="browse-default custom-select" name="categoryname">
							<option>Choose Date</option>
							
       					</select>
       				
       				</div>
       			</div>

				 <div class="form-group row">
						<label for= "SubCategoryName" class="col-sm-2 col-form-label">Choose Subcategory Name</label>
						<div class="col-sm-10">
						<div class="col-sm-10">
						<select class="browse-default custom-select" name="subcategory">
						<option>Choose Sub Category</option>
						@foreach($subcategories as $sub)
						<option value="{{$sub->id}}">
						{{$sub->name}}
						</option>
						@endforeach
						</select>
						</div>
						</div>
				</div>


       			<div class="form-group row">
					<label for= "deposit" class="col-sm-2 col-form-label">Deposit</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="deposit" placeholder="Enter Deposit in %" name="deposit">
					</div>
				</div>

				<div class="form-group row">
					<label for= "discount" class="col-sm-2 col-form-label">Discount </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="discount" placeholder="Enter Discount" name="discount">
					</div>
				</div>

				<div class="form-group row">
					<label for= "description" class="col-sm-2 col-form-label">Description</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="description" placeholder="Enter Description" name="description">
					</div>
				</div>

				<div class="form-group row">
					<label for="price" class="col-sm-2 col-form-label">Price</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
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