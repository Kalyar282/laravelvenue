@extends('backend.master')
@section('style')


 <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
 @endsection 

@section('content')

	
	<div class="container-fluid">
	<div class="card-body"> 
		<div class="table-responsive">
	<h1>Room List</h1>
	<a href="{{route('rooms.create')}}"><button class="btn btn-primary" type="submit" style="float: right; margin-right: 200px;">Add New</button></a> 
	<table class="table-bordered table" id="dataTable">
		<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Photo</th>
			<th>Date</th>
			<th>Price</th>
			<th>Deposit</th>
			<th>Description</th>
			<th>Discount</th>
			<th>Location Name</th>
			<th>Subcategory Name</th>

			<th>Action</th>
			
		</tr>
		</thead>

		<tbody>
			@php $i=1; @endphp 
			@foreach($rooms as $row)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$row->name}}</td>
				<td><img src="{{asset($row->photo)}}" class="img-fluid w-25" style="width:100px height:100px" alt=""></td>
				<td>{{$row->calendar_id}}</td>
				<td>{{$row->price}}</td>
				<td>{{$row->deposit}}</td>
				<td>{{$row->description}}</td>
				<td>{{$row->discount}}</td>
				<td>{{$row->location->address}}</td>
				<td>{{$row->subcategory->name}}</td>

					<td>
						<a href="{{route('rooms.edit',$row->id)}}" class="btn btn-warning">Edit
						</a>
						
						<form method="post" action="{{route('rooms.destroy',$row->id)}}"
							onsubmit="return confirm('Are you sure?')">
							@csrf
							@method('DELETE')
							<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
						</form>
					</td>

				</tr>
				@endforeach
			</tbody>
	</table>
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


