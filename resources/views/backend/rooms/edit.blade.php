@extends('backend.master')
@section('style')


 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
 @endsection 

@section('content')
<div class="card shadow mb-4">
	<h1 class="h3 mb-2 text-gray-800"> Edit Rooms</h1>

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

			<form action="{{route('rooms.update',$room->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
		

				<div class="form-group row">
					<label for= "RoomName" class="col-sm-2 col-form-label">Room Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="RoomName" placeholder="Name" name="name" required="required" value="{{$room->name}}">
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
							<img src="{{asset($room->photo)}}" class="img-fluid w-25">
							<input type="hidden" name="oldphoto" value="{{$room->photo}}">
						</div>

						<div class="tab-pane fade mt-3" id="new" role="tabpanel">
						<input type="file" name="photo" id="photo" accept="images/*">
					</div>
					</div>
				</div>
			</div>

				<div class="form-group row">
					<label for= "deposit" class="col-sm-2 col-form-label">Deposit</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="deposit" placeholder="Name" name="deposit" required="required" value="{{$room->deposit}}">
					</div>
				</div>
				<div class="form-group row">
					<label for= "discount" class="col-sm-2 col-form-label">Discount</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="discount" placeholder="Name" name="discount" required="required" value="{{$room->discount}}">
					</div>
				</div>

				<div class="form-group row">
					<label for= "price" class="col-sm-2 col-form-label">Price</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="price" placeholder="Name" name="price" required="required" value="{{$room->price}}">
					</div>
				</div>

				<div class="form-group row">
					<label for= "description" class="col-sm-2 col-form-label">Description</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="description" placeholder="Name" name="description" required="required" value="{{$room->description}}">
					</div>
				</div>

				<div class="form-group row">
						<label for= "subcategoryName" class="col-sm-2 col-form-label"> Sub Category </label>
						<div class="col-sm-10">
						<select class="browse-default custom-select" name="subcategory">
						<option>Choose Sub Category </option>
						@foreach($subcategories as $row)
						<option value="{{$row->id}}" 
						@if($room->subcategory_id == $row->id) 
						{{'selected'}} @endif>{{$row->name}}
						</option>
						@endforeach
						</select>
						</div>
       			</div>

       				<div class="form-group row">
						<label for= "locationName" class="col-sm-2 col-form-label"> Location </label>
						<div class="col-sm-10">
						<select class="browse-default custom-select" name="location">
						<option>Choose Location </option>
						@foreach($locations as $row)
						<option value="{{$row->id}}" 
						@if($room->location_id == $row->id) 
						{{'selected'}} @endif>{{$row->address}}
						</option>
						@endforeach
						</select>
						</div>
       				</div>


						
					</select>
       			
       				</div>
       			</div>

				<div class="form-group row"> 
					<div class ="col-sm-2"></div>
					<div class ="col-sm-10">

						<button type="submit" class="btn btn-primary"> 
							<i class="fa fa-save"> </i>Update
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